<?php
namespace App\Http\Controllers;

class TextWrapController extends Controller
{

    public function format()
    {
        $read_file = file_get_contents('./problem2.txt');
        $word_in_file = explode(" ", $read_file);
        $eighty_line_string = "";
        $string_to_check = "";
        $saved_for_next_line = "";

        for($i = 0; $i < count($word_in_file); $i++)
        {
            $find_a_paragraph_break = "/\.\s/";
            $find_a_paragraph_break_question = "/\?\"\s/";
            $find_a_paragraph_break_period = "/\.(.*)\"\s/";

            if(preg_match($find_a_paragraph_break, $word_in_file[$i])) {
                $paragraph_break = explode(".", $word_in_file[$i]);
                $string_to_check .= $paragraph_break[0] . "." . "<br/><br/>";
                $saved_for_next_line .= $paragraph_break[1] . " ";
                $eighty_line_string .= $string_to_check;
                $string_to_check = "";
            }elseif(preg_match($find_a_paragraph_break_question, $word_in_file[$i])) {
                $paragraph_break = explode("?", $word_in_file[$i]);
                $string_to_check .= $paragraph_break[0] . '?"' . "<br/><br/>";
                $saved_for_next_line .= preg_replace("/\"\s/", "", $paragraph_break[1], 1) . " ";
                $eighty_line_string .= $string_to_check;
                $string_to_check = "";
            }elseif (preg_match($find_a_paragraph_break_period, $word_in_file[$i]))
            {
                $paragraph_break = explode(".", $word_in_file[$i]);
                $string_to_check .= $paragraph_break[0] . '".' . "<br/><br/>";
                $saved_for_next_line .= preg_replace("/\"\s/", "", $paragraph_break[1], 1) . " ";
                $eighty_line_string .= $string_to_check;
                $string_to_check = "";
            } else{
                if(!empty($saved_for_next_line))
                {
                    $string_to_check .= $saved_for_next_line.   $word_in_file[$i] . " ";
                    $saved_for_next_line = "";
                }else {
                    $string_to_check .= $word_in_file[$i] . " ";
                }
                $characters_in_string = strlen($string_to_check);
                if($characters_in_string >= 80)
                {
                    if($characters_in_string == 80) {

                        $eighty_line_string .= $string_to_check . "<br/>";
                        $string_to_check = "";
                    } else {

                        $pieces = explode(" ", $string_to_check);
                        $clean_array = array_filter($pieces);
                        $last_word = array_pop($clean_array);

                        foreach($clean_array as $piece)
                        {
                            $eighty_line_string .= $piece . " ";
                        }

                        $eighty_line_string .= "<br />";
                        $string_to_check = $last_word . " ";
                    }
                }
            }

            if($i == (count($word_in_file) -1)) {
                $eighty_line_string .= $string_to_check;
            }
        }

        return view('welcome', [
            'read_file' => $eighty_line_string,
        ]);
    }
}