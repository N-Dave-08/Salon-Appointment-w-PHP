<?php


// REVIEWS
class Reviews extends Model
{

	protected $table = 'ratings';

	public function removeByUserId($userId)
    {
        $this->delete($userId, 'user_id');
    }
}