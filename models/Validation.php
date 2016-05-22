<?php

class Validation
{
	public static function checkName($name)
	{
        if (strlen($name) >= 3) {
            return true;
        }
        return false;
    }

	public static function checkPhone($phone)
	{
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

	public static function checkEmail($email)
	{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}