<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Builder;

class UserVoteOptionRepo
{
    protected static $model = 'App\UserVoteOption';

    public static function hasUserChosenOption(int $userID , int $optionID){
        return self::getRecords([
            'user_id' => $userID ,
            'option_id' => $optionID ,
        ]);
    }

    public static function hasUserVoted(int $userID , int $voteID){
        return self::getRecords([
            'user_id' => $userID ,
            'vote_id' => $voteID ,
        ]);
    }

    /**
     * @param string $table
     * @param array $columns
     * @param array $filters
     * @param array $multiValueFilter
     * @return Builder
     */
    public static function getRecords(array $filters=[] , array $multiValueFilter=[]):Builder{
        $records = self::$model::query();

        self::filter($records, $filters);
        self::filterMultipleValue($records, $multiValueFilter);

        return $records;
    }

    protected static function filter(Builder $records , array $filters):void {
        foreach ($filters as $key => $filter) {
            $records->where($key , $filter);
        }
    }

    protected static function filterMultipleValue(Builder $records , array $filters):void {
        foreach ($filters as $key => $filter) {
            $records->whereIn($key , $filter);
        }
    }
}
