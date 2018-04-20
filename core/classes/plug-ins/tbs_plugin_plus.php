<?php

/******************************************************************
 * TBS Plus! TinyButStrong Plugin
 * Version 1.02 for TinyButStrong 3.2
 * By Ho Yiu YEUNG, aka Sheepy
 *    your.sheepy@gmail.com
 ******************************************************************
 * TinyButStrong by skrol29@freesurf.fr at www.tinybutstrong.com 
 ******************************************************************/

define('TBS_PLUS', 'clsTbsPlugInPlus');
$GLOBALS['_TBS_AutoInstallPlugIns'][] = TBS_PLUS; // Auto-install

class clsTbsPlugInPlus {

  function OnInstall() {
    $this->Version = '1.0.3';
    return array (
      'OnFormat'
    );
  }

  function OnFormat($FieldName, & $Value, & $PrmLst, & $TBS) {
    foreach ($PrmLst as $key => $param) {
      $key = strtolower($key);
      switch ($key) {
        case 'val': $Value = $param; break; // Assignment

        // Mathematical operations
    /**/case 'add':/***/
        case '+': $Value += $param; break; // Addition
        case '-': if ($param===true) { $Value = -$Value; break; }  // Reversal if no param
    /**/case 'dec':/***/
          $Value -= $param; break; // Decreasenent
    /**/case 'multi':/***/
        case '*': $Value *= $param; break; // Multiplication
    /**/case 'div':/***/
        case '/': $Value /= $param; break; // Division
        case 'inv': $Value = $param / $Value; break; // Inversion
    /**/case 'mod':/***/
        case '%': if ($param===true) $Value *= 100; else $Value = $Value % $param; break;
        case '.%': $Value /= 100; break;
        case '-%':
          if ($param === true) { // Reverse percent
            if ($Value <= 1) $Value = 1-$Value;  // No parameter, reverse value
          } else {
            if ($param <= 1) $Value = $Value * ( 1-$param ); // Has parameter, apply reverse percent
          }
         break;
    /**/case 'power':/***/
        case '^': $Value = pow($Value, $param); break; // Power to value
        case 'random':
          if ($param === true) { // No parameter
            $Value = (int)$Value;
            $Value = mt_rand(min(1,$Value),max(1,$Value));
          } else {
            $param = (int)$param;
            if (is_int($Value)) { // Parameter + Value
              $Value = (int)$Value;
              $Value = mt_rand(min($Value,$param), max($Value,$param));
            } else  // Parameter with no value
              $Value = mt_rand(min(1,$param),max(1,$param));
          }
          break; // Random number of 1..(int)value
        case 'sqrt': $Value = sqrt($Value); break; // Square root
        case 'floor': $Value = floor($Value); break; // Floor number
        case 'round': $Value = round($Value); break; // Floor number
    /**/case 'neg': $Value = - $Value; break; // Negation /***/
        case 'abs': if (is_numeric($Value)) $Value = abs($Value); break;

        // String operations
        case 'substr': // Substring
          $param = explode(',', $param, 2);
          if (sizeof($param) == 1)
            $Value = substr($Value, $param[0]);
          else //if (sizeof($param) == 2)
            $Value = substr($Value, $param[0], $param[1]);
//          else
//            $Value = substr_replace($Value, $param[0], $param[1], $param[2]);
          break;
        case 'lowercase': $Value = strtolower($Value); break;
        case 'uppercase': $Value = strtoupper($Value); break;
        case 'titlecase': $Value = ucwords(strtolower($Value)); break;
        case 'replace': // Substring
          $param = explode(',', $param, 2);
          if (sizeof($param) == 1)
            $Value = str_replace($param[0], '', $Value);
          else
            $Value = str_replace($param[0], $param[1], $Value);
          break;
        case 'repeat': if (is_string($Value)) $Value = str_repeat($Value, $param); break; // str_repeat, count as param
        case 'repeatstr':  if (is_string($param)) $Value = str_repeat($param, $Value); break;  // str_repeat, str as param
        case 'prefix': $Value = $param . $Value; break; // Prefix
        case 'postfix': $Value = $Value . $param; break; // Postfix
    /**/case 'prepostfix' :/***/
        case 'prepost': // pre + postfix
          $param = explode(',', $param, 2);
          if (sizeof($param) == 1)
            $Value = $param[0] . $Value . $param[0];
          else
            $Value = $param[0] . $Value . $param[1];
          break;

        // Magnet functions
    /**/case 'reversemagnet':/***/
        case '!magnet': $Value = ($Value === '') ? ' ' : '';  if ($param !== true) $PrmLst['magnet']=$param; break; // Change '' to space and everything else to ''
        case 'zeromagnet': if (is_numeric($Value) && !(float)$Value) $Value=''; if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if zero
    /**/case 'nonzeromagnet':/***/
        case '!zeromagnet': if (is_numeric($Value) && (float)$Value) $Value=''; if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if number but not zero
        case 'emptymagnet':  if (empty ($Value)) $Value = ''; if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if empty
    /**/case 'nonemptymagnet':/***/
        case '!emptymagnet': if (!empty($Value)) $Value = ''; if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if something (non-empty)
        case 'boolmagnet': $Value = (!$Value ? '' : ' '); if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if false, ' ' otherwise
        case '!boolmagnet': $Value = ($Value ? '' : ' '); if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if true, ' ' otherwise
        case 'equalmagnet':  if ($Value == $param) $Value = ''; break; // Change to '' if equal to param
    /**/case 'unequalmagnet':/***/
        case '!equalmagnet': if ($Value != $param) $Value = ''; break; // Change to '' if equal to param
        case 'inarraymagnet': if (is_array($Value) && in_array($param, $Value)) $Value = ''; break; // Change to '' if equal to param
        case '!inarraymagnet': if (is_array($Value) && !in_array($param, $Value)) $Value = ''; break; // Change to '' if equal to param
        case 'filemagnet': if (!file_exists($Value)) $Value = ''; if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if $value does not exist as a file
        case '!filemagnet': if (file_exists($Value)) $Value = ''; if ($param !== true) $PrmLst['magnet']=$param; break; // Change to '' if $value does not exist as a file

        // Array functions
        case 'explode': if (is_string($Value)) $Value = explode(($param!==true)?$param:',', $Value); break; // Explode value using given separator
        case 'implode': if (is_array($Value)) $Value = implode(($param!==true)?$param:',', $Value); break; // Explode value using given separator
        case 'sizeof': if (is_array($Value)) $Value = sizeof($Value); else if (is_string($Value)) $Value = strlen($Value); break;  // Size of array or string

        // Conversion functions
    /**/case 'not':/***/
        case '!': $Value = !$Value; break;
        case '2bool': // False if zero, empty, null, 'No', 'N', 'False', 'F', true otherwise
          $Value = (!$Value || in_array(strtolower($Value), array('n','no','f','false'))) ? false : true;
          break;
        case '2space': if ($Value != '') $Value = ' '; break; // Space if non-blank
        case '_': if ($Value != '') $Value = ' '; break; // Space if non-blank
        case 'empty2zero': if (empty ($Value)) $Value = 0; break; // Make value zero if it's empty
        case 'empty2blank': if (empty ($Value)) $Value = ''; break; // Make value '' if it's empty
        case 'empty2space': if ($Value !== '') $Value = ' '; break; // Change to space if not ''
        
        // Other helper functions
        case 'func': $Value = $param($Value); break; // Call function
        case 'between':
          list($left,$right)=explode(',',$param,2);
          $min = min($left,$right); $max = max($left,$right);
          $Value = $Value <= $max && $Value >= $min; break; 
        case 'randomfile': // Using value as file pattern, randomly pick a file, or return '' if no file found
          $list = glob($Value, GLOB_NOESCAPE + GLOB_BRACE + GLOB_NOSORT);
          $Value = empty ($list) ? '' : $Value = str_replace('\\', '/', $list[mt_rand(0, sizeof($list) - 1)]);
          break;
        case 'missingfile': if (!file_exists($Value)) $Value = $param; break; // If value as a file does not exist, replace with parameter
        case 'htmlchecked': $Value = $Value ? 'checked="checked"' : $Value = ''; break; // If not empty, change value to 'checked'
        case 'zebra' :  // Merge alternatively with parameters 
          static $zebra = array ();
          $hash = sha1($FieldName.$param);
          if (!isset ($zebra[$hash])) {
            $zebra[$hash] = array (
              'values' => explode(',', $param),
              'index' => 0,
              );
            $z = & $zebra[$hash];
            $index = 0;
          } else {
            $z = & $zebra[$hash];
            $index = $z['index'] = ++$z['index'] % sizeof($z['values']);
          }
          $Value = $z['values'][$index];
          break;
      }
    }
  }
}

?>
