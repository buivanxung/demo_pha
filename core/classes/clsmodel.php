<?php
	ADOdb_Active_Record::SetDatabaseAdapter($objDbUpdate);
	// Class 2 la cai tien cua class 1 truyen vao mang cac ten field can hien thi thay vi mang cac ten field khong hien thi
	class ObjData2 extends ADOdb_Active_Record
	{
		var $arrInputFields = array();		// Mang chua cac field hien thi len form cho nhap ket qua vao
		var $arrValidator = array();		// Mang chua cac validator cho cac field
		var $arrRequired = array();		// Mang chua cac field bat buoc phai nhap
		var $arrInput = array();				// Mang chua cac field co kieu dac biet khong phai textbox
		var $arrCaptions = array();		// Mang chua cac caption hien thi tren giao dien
		var $arrFieldsMap = array();		// Mang chua anh xa giua ten field va ten doi tuong HTML tuong ung tren form nhap
		var $arrAddHTML = array();		// Mang chua cac doan code HTML duoc dua vao sau doi tuong
		var $arrPreHTML = array();		// Mang chua cac doan code HTML duoc dua vao truoc doi tuong
		var $arrFieldData = array();		// Mang chua gia tri cho cac doi tuong la combobox
		var $arrSectionHeader = array(); // Mang chua cac text o dau moi section
		var $arrSectionFooter = array(); // Mang chua cac text o cuoi moi section
		var $arrReadOnly = array();			// Mang chua cac doi tuong readonly
		var $arrDisabled = array();         // mang chua cac doi tuong hien thi
		// Ham tao table hien thi cac thong tin can thiet
		function InfoViewGen($bFillData=true)
		{
			$arrFields = $this->getAttributeNames();
			// Kien sua :: Fix loi khong lay duoc danh sach field
			if(!is_array($arrFields))
			{
				$arrFields = array();
			}
			$sReturn = '<table border= "0" cellSpacing="0" cellPadding="2">'."\n";
			$sReturn = $sReturn.'<tbody>'."\n";
			foreach($this->arrInputFields as $key=>$value)
			{
				if(in_array($value, $arrFields))
				{
					// Them header text
					if(isset($this->arrSectionHeader[$value]) && ($this->arrSectionHeader[$value] != '') )
					{
						$sReturn = $sReturn.'<tr valign="top">'."\n";
						$sReturn = $sReturn.'<td colspan="2">'."\n".$this->arrSectionHeader[$value]."\n".'</td>';
						$sReturn = $sReturn.'</tr>'."\n";
					}

					$sReturn = $sReturn.'<tr valign="top">'."\n";
					$sCaption = isset($this->arrCaptions[$value]) ? $this->arrCaptions[$value] : $value;
					$sReturn = $sReturn.'<td align="right">'.$sCaption.' :</td>'."\n";
					if($bFillData === true)
					{
						$sReturn = $sReturn.'<td id="td'.$value.'">&nbsp;'.$this->$value.'</td>'."\n";
					}
					else
					{
						$sReturn = $sReturn.'<td id="td'.$value.'">&nbsp;</td>'."\n";
					}

					$sReturn = $sReturn.'</tr>'."\n";

					// Them footer text
					if(isset($this->arrSectionFooter[$value]) && ($this->arrSectionFooter[$value] != '') )
					{
						$sReturn = $sReturn.'<tr valign="top">'."\n";
						$sReturn = $sReturn.'<td colspan="2">'."\n".$this->arrSectionFooter[$value]."\n".'</td>';
						$sReturn = $sReturn.'</tr>'."\n";
					}
				}
			}
			$sReturn = $sReturn.'</tbody></table>'."\n";
			return($sReturn);
		}// End of function InfoViewGen

		// Ham tao giao dien form
		function FormGen($nLeftWidth=150, $nRightWidth=300)
		{
			// Ham khoi tao form, mac dinh cac doi tuong nhap la textbox ngoai tru nhung truong hop chi ro ra
			$arrFields = $this->getAttributeNames();
			// Kien sua :: Fix loi khong lay duoc danh sach field
			if(!is_array($arrFields))
			{
				$arrFields = array();
			}
			$sReturn = '<table border= "0" cellSpacing="0" cellPadding="2"  align="center">'."\n";
			$sReturn = $sReturn.'<tbody>'."\n";
			foreach($this->arrInputFields as $key=>$value)
			{
				//if(in_array($value, $arrFields))
				//{
					// Them header text
					if(isset($this->arrSectionHeader[$value]) && ($this->arrSectionHeader[$value] != '') )
					{
						$sReturn = $sReturn.'<tr valign="top">'."\n";
						$sReturn = $sReturn.'<td colspan="2">'."\n".$this->arrSectionHeader[$value]."\n".'</td>';
						$sReturn = $sReturn.'</tr>'."\n";
					}
					$sReturn = $sReturn.'<tr valign="top">'."\n";
					$sCaption = isset($this->arrCaptions[$value]) ? $this->arrCaptions[$value] : $value;
					$sCaptionClass = (isset($this->arrRequired[$value]) && ($this->arrRequired[$value]==1)) ? 'class="force"': '';
					$sReturn = $sReturn.'<td align="right" '.$sCaptionClass.' style="width:'.$nLeftWidth.'px">'.$sCaption.':&nbsp;</td>'."\n";
					$sReturn = $sReturn.'<td align="left" style="white-space:nowrap;width:'.$nRightWidth.'px">&nbsp;'.$this->InputGen($value).'</td>'."\n";
					$sReturn = $sReturn.'</tr>'."\n";
					// Them footer text
					if(isset($this->arrSectionFooter[$value]) && ($this->arrSectionFooter[$value] != '') )
					{
						$sReturn = $sReturn.'<tr valign="top">'."\n";
						$sReturn = $sReturn.'<td colspan="2">'."\n".$this->arrSectionFooter[$value]."\n".'</td>';
						$sReturn = $sReturn.'</tr>'."\n";
					}
				//}
			}
			$sReturn = $sReturn.'</tbody></table>'."\n";
			return($sReturn);
		}// End of function FormGen

		function InputGen($sFieldName)
		{
			$sInputname = isset($this->arrFieldsMap[$sFieldName]) ? $this->arrFieldsMap[$sFieldName] : $sFieldName;
			$sInputType = isset($this->arrInput[$sFieldName]) ? $this->arrInput[$sFieldName] : 'text';
			$sDis = isset($this->arrDisabled[$sFieldName])?$this->arrDisabled[$sFieldName]:'';
			$sReturn = '';
			// kiem tra neu can thi them doan PREHTML vao
			if(isset($this->arrPreHTML[$sFieldName]))
			{

				$sReturn = $sReturn.$this->arrPreHTML[$sFieldName];
			}

			switch($sInputType)
			{
				case 'textarea':
				$sReturn = '<textarea name="'.$sInputname.'" id="'.$sInputname.'" cols="60" rows="5" style="overflow:auto" class="input"'.(isset($this->arrReadOnly[$sFieldName]) ? ' readonly' : '').'></textarea>';
					break;

				case 'combobox':
				$sReturn = '<select name="'.$sInputname.'" id="'.$sInputname.'" style="width:230px"'.(isset($this->arrReadOnly[$sFieldName]) ? ' readonly' : '').'>'."\n";
					if(!isset($this->arrFieldData[$sFieldName]) || !is_array($this->arrFieldData[$sFieldName]))
					{
						$this->arrFieldData[$sFieldName] = array();
					}
					foreach($this->arrFieldData[$sFieldName] as $key=>$value)
					{
						$sReturn = $sReturn.'<option value="'.$key.'">'.$value.'</option>'."\n";
					}
					$sReturn = $sReturn.'</select>';
					break;

				case 'checkbox':
				$sReturn = '<input type="'.$sInputType.'" name="'.$sInputname.'" id="'.$sInputname.'" class="input"'.(isset($this->arrReadOnly[$sFieldName]) ? ' readonly' : '').'>';
					break;
				case 'password':
				$sReturn = '<input type="'.$sInputType.'" name="'.$sInputname.'" id="'.$sInputname.'"  style="width:230px" class="input"'.(isset($this->arrReadOnly[$sFieldName]) ? ' readonly' : '').'>';
					break;
				case 'date' :
					  $sReturn= '<input type="text"  name="'.$sInputname.'" id="'.$sInputname.'" '.$sDis.' size="30" class="input">  
					   <a href="javascript:cal'.$sInputname.'.popup();">
						<img src="images/cal/cal.gif" width="16" height="16" id="img"'.$sInputname.' border="0" alt="Click Here to Pick up the date">
					   </a>
					   <script type="text/javascript">var cal'.$sInputname.' = CreateCalObject("'.$sInputname.'", "img'.$sInputname.'");</script>
					   ';
					break;   
				case 'datetime' :
					  $sReturn= '<input type="text"  name="'.$sInputname.'" id="'.$sInputname.'" '.$sDis.' size="30" class="input">  
					   <a href="javascript:cal'.$sInputname.'.popup();">
						<img src="images/cal/cal.gif" width="16" height="16" id="img"'.$sInputname.' border="0" alt="Click Here to Pick up the date">
					   </a>
					   <script type="text/javascript">
						var cal'.$sInputname.' = CreateCalObject("'.$sInputname.'", "img'.$sInputname.'");
						cal'.$sInputname.'.time_comp = true;
					   </script>
					   ';
					break;  
       //<script>var cal1 = CreateCalObject('.$sInputname.', 'imgcal1');</script>';  
       //<script language="javascript"  src="scripts/calendar2.js"> var cal1 = CreateCalObject('.$sInputname.', 'imgcal1');</script>';	
				case 'none':
					// Truong hop khong muon tu dong sinh thi lay doan ma HTML o addHTML
					break;

			default:
				$sReturn = '<input type="text" name="'.$sInputname.'" id="'.$sInputname.'" style="width:230px" class="input"'.(isset($this->arrReadOnly[$sFieldName]) ? ' readonly' : '').'>';
				break;
			}
			if(isset($this->arrAddHTML[$sFieldName]))
			{
				$sReturn = $sReturn.$this->arrAddHTML[$sFieldName];
			}
			return($sReturn);
		}// End of function InputGen

		function JSValidateGen($objName)
		{
			// Ham sinh code validator Javascript, CHU Y: khong sinh dong code tao doi tuong
			$sReturn = '';
			//----- Sinh nhung field yeu cau phai nhap
			foreach($this->arrRequired as $key=>$value)
			{
				if($value == 1)
				{
					$sObjName = isset($this->arrFieldsMap[$key]) ? $this->arrFieldsMap[$key] : $key;
					$sReturn = $sReturn.$objName.'.AddRequired("'.$sObjName.'");'."\n";
				}
			}// Het sinh nhung filed bat buoc phai nhap.

			//---- Sinh nhung field yeu cau validate
			foreach($this->arrValidator as $key=>$value)
			{
				$sObjName = isset($this->arrFieldsMap[$key]) ? $this->arrFieldsMap[$key] : $key;
				$sValidator = $value;
				$sReturn = $sReturn.$objName.'.AddValidation("'.$sObjName.'", "'.$sValidator.'");'."\n";
			}
			return($sReturn);
		}// End of function JSValidateGen

		function AjaxSetForm(&$objResponse)
		{
			// Kiem tra neu khong dung class thi bo qua
			$sClassName = strtolower(get_class($objResponse));
			if( $sClassName != 'xajaxresponse')
			{
				return(false);
			}
			// Ham gan gia tri cho cac o nhap trong form, du lieu lay tu database
			$arrFields = $this->getAttributeNames();
			// Kien sua :: Fix loi khong lay duoc danh sach field
			if(!is_array($arrFields))
			{
				$arrFields = array();
			}
			foreach($arrFields as $key=>$value)
			{
				if (in_array($value, $this->arrInputFields))
				{
					$sInputName = (isset($this->arrFieldsMap[$value])) ? $this->arrFieldsMap[$value] : $value;
					$sInputValue = $this->$value;
					$objResponse->addAssign($sInputName, 'value', $sInputValue);
				}
			}
			return(true);
		}// AjaxSetForm

		function GetAutoFields($arrSrc, $bCheck = true)
		{
			if(!isset($arrSrc))
			{
				$arrSrc = $_POST;
			}
			if(!is_array($arrSrc))
			{
				return(false);
			}
			$arrFields = $this->getAttributeNames();
			// Kien sua :: Fix loi khong lay duoc danh sach field
			if(!is_array($arrFields))
			{
				$arrFields = array();
			}
			foreach($arrFields as $key=>$value)
			{
				if (in_array($value, $this->arrInputFields))
				{
					$sInputName = (isset($this->arrFieldsMap[$value])) ? $this->arrFieldsMap[$value] : $value;
					if(isset($arrSrc[$sInputName]))
					{
						$this->$value = $arrSrc[$sInputName];
					}
				}
			}
			return(true);
		}// end of function GetAutoFields

		function GetAutoArr($arrSrc, &$arrReturn, $bCheck = true)
		{
			if(!isset($arrSrc))
			{
				$arrSrc = $_POST;
			}
			if(!is_array($arrSrc))
			{
				return(false);
			}
			$arrFields = $this->getAttributeNames();
			// Kien sua :: Fix loi khong lay duoc danh sach field
			if(!is_array($arrFields))
			{
				$arrFields = array();
			}
			foreach($arrFields as $key=>$value)
			{
				if (in_array($value, $this->arrInputFields))
				{
					$sInputName = (isset($this->arrFieldsMap[$value])) ? $this->arrFieldsMap[$value] : $value;
					if(isset($arrSrc[$sInputName]))
					{
						$arrReturn[$value] = $arrSrc[$sInputName];
					}
				}
			}
			return(true);
		}// end of function GetAutoArr

		function ValidateData()
		{
			$theValidator = new CValidator();
			if(!$this->arrValidator || !is_array($this->arrValidator) )
			{
				$this->arrValidator = array();
			}
			foreach($this->arrValidator as $key=>$value)
			{
				if($this->$key == '')
				{
					// Kiem tra xem co phai bat buoc khong?
					if(isset($this->arrRequired[$key]) && ($this->arrRequired[$key] == 1))
					{
						return(false);
					}
				}
				else
				{
					if(!$theValidator->CheckPatt($value, $this->$key))
					{
						return(false);
					}
				}
			}
			return(true);
		}
	}// Het class mdlModel2
