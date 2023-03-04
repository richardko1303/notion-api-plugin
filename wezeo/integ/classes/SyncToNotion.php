<?php

namespace Wezeo\Integ\classes;

use Illuminate\Support\Facades\Log;
//use Wezeo\Tasks\Models\Task; // Task model z pluginu AppEntities/Task
use October\Rain\Network\Http;
use Wezeo\Integ\Models\Record;

class SyncToNotion
{
    public function syncProjectToNotion($wgridID)
    {
        try {
            $project = Record::where('wgrid_project_id', $wgridID)
                ->firstOrFail();

            $this->getProjectFromApi($project->notion_block_id);
        } catch (\Exception $e) {
            return;
        }
    }

    public function getProjectFromApi($notionProjectID)
    {
        $res = Http
            ::post(
                "https://api.notion.com/v1/databases/" . getenv('NOTION_PROJECTS_DB') . "/query",
                function ($http) use ($notionProjectID) {
                    $http->header('Notion-Version', '2022-06-28');
                    $http->header('accept', 'application/json');
                    $http->header('content-type', 'application/json');
                    $http->header('Authorization', 'Bearer ' . getenv('NOTION_INTEGRATION_TOKEN'));
                }
            );

        $decodedRes = json_decode($res->body, true);

        $project = Record::where('notion_block_id', $notionProjectID)
            ->firstOrFail();

        for ($i=0; $i < count($decodedRes['results']); $i++) {
            if ($decodedRes['results'][$i]['id'] == $notionProjectID) {
                $this->updateNotionProject($notionProjectID, $project->wgrid_project_id);
                return 0;
            }
        }

        return response($res->body)
            ->header('Content-Type', 'application/json');
    }

    public function updateNotionProject($notionProjectID, $wgridProjectID)
    {
        $res = Http
            ::patch(
                "https://api.notion.com/v1/pages/" . $notionProjectID,
                function ($http) use ($wgridProjectID) {
                    $http->header('Notion-Version', '2022-06-28');
                    $http->header('accept', 'application/json');
                    $http->header('content-type', 'application/json');
                    $http->header('Authorization', 'Bearer ' . getenv('NOTION_INTEGRATION_TOKEN'));

                    $project = Record::where('wgrid_project_id', $wgridProjectID)
                        ->firstOrFail();

                    $body = [
                        "properties" => [
                            "Name" => [
                                "title" => [
                                    [
                                        "text" => [
                                            "content" => $project->project_name
                                        ]
                                    ]
                                ]
                            ],
                        ]
                    ];

                    $http->setOption(CURLOPT_POSTFIELDS, json_encode($body));
                }
            );
    }
}
