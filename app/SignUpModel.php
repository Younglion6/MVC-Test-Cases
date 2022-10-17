<?php
class SignUpModel extends Observable_Model
{
    public function getAll(): array 
    {
        // this getAll returns all courses
        $data = $this->loadData(DATA_DIR . '/courses.json');
        //return $data;

        //next get most popular and most favourite 
        $popular_column = array_column($data['courses'], 3);
        $recommended_column = array_column($data['courses'], 2);
        $extra = $data['courses'];

        array_multisort($recommended_column, SORT_DESC, $data['courses']);
        $recommended = array_slice($data['courses'], 0, 8);
        
        array_multisort($popular_column, SORT_DESC, $extra);
        $popular = array_slice($extra, 0, 8);

        return ['popular'=>$popular, 'recommended'=>$recommended];


    }


    public function getRecord(string $id): array
    {
        return [];
    }
}