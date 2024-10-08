<?php
    class SeasonProvider{
        private $con, $username;

        public function __construct($con, $username){
            $this->con = $con;
            $this->username = $username;
        }

        public function create($entity){
            $seasons = $entity->getSeasons();

            if(sizeof($seasons) == 0){
                return;
            }

            $seasonsHtml = "";
            foreach($seasons as $season){
                $seasonNumber = $season->getSeasonNumber();
                
                $videoHtml = "";
                foreach($season->getVideos() as $video){
                    $videoHtml .= $this->createVideoSquare($video);
                }

                $seasonsHtml .= "<div class='season'>
                                    <h3>Season $seasonNumber</h3>
                                    <div class='videos scroll'>$videoHtml</div>
                                </div>";
            }
            return $seasonsHtml;
        }

        private function createVideoSquare($video){
            $id = $video->getId();
            $thumbnail = $video->getThumbnail();
            $name = $video->getTitle();
            $desc = $video->getDesc();
            $episode = $video->getEpisodeNumber();

            return "<a href='watch.php?id=$id'>
                        <div class='episodeContainer'>
                            <div class='contents'>
                                <img src='$thumbnail'>
                                <div class='videoInfo'>
                                    <h4>$name</h4>
                                    <span>$desc</span>
                                </div>
                            </div>
                        </div>
                    </a>";
        }
    }
?>