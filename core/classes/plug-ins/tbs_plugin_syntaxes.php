<?php

/*
********************************************************
TinyButStrong Plug-in: this is a template plug-in that shows syntaxes for all events
Version 1.3 , on 2006-06-13, by Skrol29
********************************************************
*/

// Name of the class is a keyword used for Plug-In authentication. So i'ts better to save it into a constant.
define('TBS_THIS_PLUGIN','clsTbsThisPlugIn');

// Put the name of the class into global variable array $_TBS_AutoInstallPlugIns to have it automatically installed for any new TBS instance.
// Example :
// $GLOBALS['_TBS_AutoInstallPlugIns'][] = TBS_THIS_PLUGIN;

class clsTbsThisPlugIn {

	// Property $this->TBS is automatically set by TinyButStrong when the Plug-In is installed.
	// You can use it inside the following methods.

	function OnInstall() {
		// Executed when the current plug-in is installed automatically or manually.
		// You can define additional arguments to this method for the manual installation, but they should be optional in order to have the method compatible with automatic install.
		// This method must return the list of TBS reserved methods that you want to be activated.
		// Manual installation:
		// $TBS->PlugIn(TBS_INSTALL,TBS_PLUGIN_TEMPLATE);
		//  or the first call of:
		// $TBS->PlugIn(TBS_THIS_PLUGIN);
		$this->Version = '1.00'; // Version can be displayed using [var..tbs_info] since TBS 3.2.0
		return array('OnCommand','BeforeLoadTemplate','AfterLoadTemplate','BeforeShow','AfterShow','OnData','OnFormat','OnOperation','BeforeMergeBlock','OnMergeSection','AfterMergeBlock','OnSpecialVar','OnMergeField');
	}

	function OnCommand($x1,$x2) {
		// Executed when TBS method PlugIn() is called. Arguments are for your own needs.
		// You can use as many arguments as you want, but they have to be compatible with your PlugIn() calls.
		// Example:  $TBS->PlugIn(TBS_THIS_PLUGIN,$x1,$x2);
	}

	function BeforeLoadTemplate(&$File,&$HtmlCharSet) {
		// Executed before a template is loaded. Arguments are those passed to method LoadTemplate().
		// If you make this method to return value False, then the default LoadTemplate() process is not executed. But AfterLoadTemplate() is checked anyway.
		// You can define additional arguments to this method in order to extend the syntax of method LoadTemplate().
	}

	function AfterLoadTemplate(&$File,&$HtmlCharSet) {
		// Executed after a template is loaded. Arguments are those passed to method LoadTemplate().
		// The value that you make this method to return is also returned by method LoadTemplate().
		// You can define additional arguments to this method in order to extend the syntax of method LoadTemplate().
	}

	function BeforeShow(&$Render) {
		// Executed when method Show() is called. Arguments are those passed to method Show().
		// If you make this method to return value False, then the default Show() process is not executed. But AfterShow() is checked anyway.
		// You can define additional arguments to this method in order to extend the syntax of method Show().
	}

	function AfterShow(&$Render) {
		// Executed at the end ot method Show(). Arguments are those passed to method Show().
		// Output and exit are processed after this event but you can cancel any of them using the argument $Render.
		// The value that you make this method to return is also returned by method Show().
		// You can define additional arguments to this method in order to extend the syntax of method Show().
	}

	function OnData($BlockName,&$CurrRec,$RecNum,&$TBS) {
		// Executed during MergeBlock(), when TBS retrieve a record for merging.
		// This event has the same behaviour has parameter "ondata", but coded in a plug-in.
		// Please note that this event is executed only once over the data source even they are several blocks to merge with it. 
		// $BlockName: name of the block currently merged.
		// $CurrRec:  (read/write) current record.
		// $RecNum:   (read only) number of the current record (first is number 1).
		// $TBS:      extra argument for coherence with parameter 'ondata'
	}

	function OnFormat($FieldName,&$Value,&$PrmLst,&$TBS) {
		// Executed each time an item value is merged to the template, so use it only if needed.
		// If you want to supply additional parameters to TBS, it's better to use the method OnOperation.  
		// $FieldName: name of the field currently merged.
		// $Value:     value about to be merged, before the string conversion if any.
		// $PrmLst:    array of the field's parameters.
		// $TBS:       extra argument for coherence with parameter 'onformat'
	}

	function OnOperation($FieldName,&$Value,&$PrmLst,&$Txt,$PosBeg,$PosEnd,&$Loc) {
		// If the function returns false, then the TBS default merging is canceled. This can be useful when you want to customize parameter 'ope' to proceeed your own merging.
		// Executed each time a field contains parameter 'ope' with an unsupported keyword.
		// $FieldName: name of the field currently merged.
		// $Value:     (read/write) value about to be merged, before the string conversion if any.
		// $PrmLst:    the array of the field's parameters. We know that parameter 'ope' is set.
		// $Txt:       optional, undocumented.
		// $PosBeg:    optional, undocumented.
		// $PosEnd:    optional, undocumented.
		// $Loc:       optional, undocumented.
	}

	function BeforeMergeBlock(&$TplSource,&$BlockBeg,&$BlockEnd,$PrmLst,&$DataSrc,&$LocR) {
		// Executed each time a named block is found and ready for merging.
		// $TplSource: source of the current template.
		// $BlockBeg, $BlockEnd: positions of block's bound in the template's source.
		// $PrmLst:   (Reda only) the array of the block's parameters.
		// $DataSrc:  optional, undocumented.
		// $LocR:     optional, undocumented. (supported since TBS 3.0.5)
	}

	function OnMergeSection(&$Buffer,&$NewPart) {
		// Excuted before a merged section is added to the block's buffer.
	}

	function AfterMergeBlock(&$Buffer,&$DataSrc,&$LocR) {
		// Executed each time a named block is merged but not yet inserted to the template.
		// $Buffer:  merged block contents to instert into the template.
		// $DataSrc: optional, undocumented. (supported since TBS 3.0.5)
		// $LocR:    optional, undocumented. (supported since TBS 3.0.5)
	}

	function OnSpecialVar($Name,&$IsSupported,&$Value,&$PrmLst) {
		// Executed when an unsupported Special Var field ([var..*]) is met before TBS try to merge it.
		// This enables you define customized Special Var fields.
		// $Name:        (Read only) the name of the current Special Var field. 
		// $IsSupported: (Read/Write) set this argument to true to indicates that the plug-in supports the field, otherwise TBS will raise an error for unsupported Special Var field.
		// $Value:       (Read/Write) value of the field (empty string by default).
		// $PrmLst:      (Read/Write) the array of the field's parameters.

		// Extended syntax:
//function OnSpecialVar($Name,&$IsSupported,&$Value,&$PrmLst,&$Source,&$PosBeg,&$PosEnd,&$Loc) {
		// $Source:      (Read/Write) current contents of the merged template; 
		// $PosBeg:      (Read/Write) position of the first char of the current field in $Source. If this value is set to false, then TBS doesn't merge the field itself. In this case, $PosEnd must be set to the position where TBS must continue the merge.
		// $PosEnd:      (Read/Write) position of the last  char of the current field in $Source.
		// $Loc:         optional, undocumented.
	}

  function OnMergeField($AskedName,$SubName,&$Value,&$PrmLst,&$Source,&$PosBeg,&$PosEnd) {
		// Executed each time a field is merged using the MergeField() method.
		// If the function return False, then TBS won't merge the field assuming that it has been done by the current plug-in event
  }

}

?>