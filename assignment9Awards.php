<?php
class awardsPage{
    private $awardFile = 'awards9.json';

    public function getAwards(){
        $data = file_get_contents($this->awardFile);
        return json_decode($data, true)['awards'];
    }
    public function getAwardsByYear($year) {
        $awards = $this->getAwards();
        foreach ($awards as $award) {
            if ($award['year'] == $year) {
                return $award;
            }
        }
        return null;
    }
    public function getAwardsByName ($name) {
        $awards = $this->getAwards();
        foreach ($awards as $award) {
            if ($award['name'] == $name) {
                return $award;
            }
        }
        return null;
    }
    public function getAwardsByCompany ($company) {
        $awards = $this->getAwards();
        foreach ($awards as $award) {
            if ($award['company'] == $company) {
                return $award;
            }
        }
        return null;
    }
    public function saveAwards($awards) {
        $data = json_encode(['awards' => $awards], JSON_PRETTY_PRINT);
        file_put_contents($this->awardFile, $data);
    }

    public function addAward($award){
        $awards = $this->getAwards();
        $awards[] = $award;
        $this->saveAwards($awards);
    }
    public function updateAward($year, $name, $company, $updatedAward) {
        $awards = $this->getAwards();
        foreach($awards as $award) {
            if ($award['year'] == $year){
                $award = $updatedAward;
                break;
            }
            if ($award['name'] == $name) {
                $award = $updatedAward;
                break;
            }
            if ($award['company'] == $company) {
                $award = $updatedAward;
                break;
            }
        }
        $this->saveAwards($awards);
    }

    public function deleteAward($year, $name, $company) {
        $awards = $this->getAwards();
        foreach ($awards as $key => $award) {
            if ($award['year'] == $year) {
                unset($awards[$key]);
                break;
            }
            if ($award['name'] == $name) {
                unset($awards[$key]);
                break;
            }
            if ($award['company'] == $company) {
                unset($awards[$key]);
                break;
            }
        }
        $this->saveAwards($awards);
    }
}
?>