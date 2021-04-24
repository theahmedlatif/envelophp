<?php

namespace Envelope;

class Envelope
{
    //properties
    public $variables = [];

    //methods

    /**
     * @return array|string
     */
    public function getDatabaseVariables()
    {
        try {
            //open .env file in read mode
<<<<<<< HEAD
            $file = fopen(dirname(__DIR__,4).'/.env',"r");

            while (($line = fgets($file)) !== false)
            {
                $validate_line_from_env_file = preg_match('~^[a-zA-Z]~',$line);
                if ($validate_line_from_env_file)
                {
                    $env_file_text = explode('= "',$line); //split string from .env file to key & value
                    $env_variable_key_length = strpos($env_file_text[0]," "); //get length of variable associative array key
                    $env_variable_key = substr($env_file_text[0],0,$env_variable_key_length); //clean key string
                    $env_variable_value_length = strpos($env_file_text[1],"\""); //get length of variable associative array value
                    $env_variable_value = substr($env_file_text[1],0,$env_variable_value_length); //clean value string

                    // update variables associative array
                    if ($env_variable_value == true)
                    {
=======
            $file = fopen(dirname(__DIR__, 1) . '/.env', "r");

            while (($line = fgets($file)) !== false) {
                $validate_line_from_env_file = preg_match('~^[a-zA-Z]~', $line);
                if ($validate_line_from_env_file) {
                    $env_file_text = explode('= "', $line);
                    $env_variable_key_length = strpos($env_file_text[0], " ");
                    $env_variable_key = substr($env_file_text[0], 0, $env_variable_key_length);
                    $env_variable_value_length = strpos($env_file_text[1], "\"");
                    $env_variable_value = substr($env_file_text[1], 0, $env_variable_value_length);
                    if ($env_variable_value == true) {
>>>>>>> e61e1ba090c3406224ff59bb3223be4cf2a2541d
                        $this->variables += [$env_variable_key => $env_variable_value];
                    } elseif ($env_variable_value === "") {
                        $this->variables += [$env_variable_key => ""];
                    }
                }
            }
            fclose($file);
            return $this->variables;
        } catch (Error $error) {
            return "Error: $error->getMessage()";
        }
    }
}



