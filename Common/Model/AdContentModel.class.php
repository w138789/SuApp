<?php
class AdContentModel extends Model
{
    public $table = 'ad_content';
    function ad()
    {
        return $this;
    }
}