<?php
namespace Tal;

class EnvironmentVariables{
    //properties
    public $variables = [];

    //methods

    /**
     * @return array of database variables stated @see '.\.env'
     */
    public function getDatabaseVariables()
    {
        try {
            //open .env file in read mode
            $file = fopen(dirname(__DIR__,1).'\.env',"r");

            while (($line = fgets($file)) !== false)
            {
                $validate_line_from_env_file = preg_match('~^[a-zA-Z]~',$line);
                if ($validate_line_from_env_file)
                {
                    $env_file_text = explode('= "',$line);
                    $env_variable_key_length = strpos($env_file_text[0]," ");
                    $env_variable_key = substr($env_file_text[0],0,$env_variable_key_length);
                    $env_variable_value_length = strpos($env_file_text[1],"\"");
                    $env_variable_value = substr($env_file_text[1],0,$env_variable_value_length);
                    if ($env_variable_value == true)
                    {
                        $this->variables += [$env_variable_key => $env_variable_value];
                    }
                    elseif ($env_variable_value === "")
                    {
                        $this->variables += [$env_variable_key => ""];
                    }

                }
            }
            fclose($file);
            return $this->variables;
        } catch (Error $error) {
            echo "Error: $error->getMessage()";
        }
    }
}



