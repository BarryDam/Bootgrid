<?php
	/**
	 * bdBootgrid
	 * php class for building data needed with jQuery Bootgrid - www.jquery-bootgrid.com - https://github.com/rstaib/jquery-bootgrid
	 *
	 * Barry Dam - www.barrydam.nl - https://github.com/VyseExhale
	 * 
	 * @uses cArrayMultidimensional.php and cString.php 
	 * get them here (https://github.com/VyseExhale/PHP-Class-Extenders)
	 */
	class bdBootgrid {

		protected $arrRows 					= array();
		protected $arrSearchableProperties 	= array();
		
		public function __construct($getRows = array(), $getSearchableProperties = array())
		{
			$this->setRows($getRows);
			$this->setSearchableProperties($getSearchableProperties);
		}

		public function setRows(array $getRows)
		{
			$this->arrRows = $getRows;
		}

		public function setSearchableProperties(array $getProperties)
		{
			$this->arrSearchableProperties = $getProperties;
		}

		/**
		 * [fetch description]
		 * @param  integer $getCurrent       current bootgrid page
		 * @param  integer $getRowCount      rows per bootgrid page
		 * @param  string  $getSort          property to sort on
		 * @param  integer $getSortOrder     sorting flag order (http://php.net/manual/en/array.constants.php)
		 * @param  string  $getSearchPhrase  search phrase
		 * @return array   result for bootgrid
		 */
		public function fetch($getCurrent = 1, $getRowCount = 10, $getSort = '', $getSortOrder = SORT_ASC, $getSearchPhrase = '')
		{
			$objRows = new cArrayMultidimensional($this->arrRows);
			// search
			if (! empty($getSearchPhrase)) 
				$objRows->filterBySearch($getSearchPhrase, $this->arrSearchableProperties);
			// sort
			if (! empty($getSort))
				$objRows->sortBy(array($getSort => (is_numeric($getSortOrder) ? $getSortOrder : SORT_ASC)));

			// recreate row array
			$arrRows 	= array_values((array) $objRows);
			$intTotal 	= count($arrRows);

			// cut the array
			if ($intTotal > $getRowCount) {
				$intStart = 1 + ($getCurrent*$getRowCount) - $getRowCount;
				$arrRows  = array_slice($arrRows, $intStart,	$getRowCount);
			}

			// build the final array
			return array(
				'current'  	=> $getCurrent,
				'rowCount' 	=> $getRowCount,
				'rows'		=> $arrRows,
				'total'		=> $intTotal
			);
		}

		/**
		 * get result data by request data fired by bootgrid.js
		 * @return array
		 */
		public function fetchByRequest()
		{
			if (! isset($_REQUEST['current']) || ! isset($_REQUEST['rowCount']))
				return array();
			return $this->fetch(
				$_REQUEST['current'],
				$_REQUEST['rowCount'],
				isset($_POST['sort']) ? key($_POST['sort']) : false ,
				isset($_POST['sort']) 
					? ($_POST['sort'][key($_POST['sort'])] == 'desc' ? SORT_DESC : SORT_ASC) 
					: SORT_ASC ,
				isset($_POST['searchPhrase']) ? $_POST['searchPhrase'] : ''
			);
		}	
	}
?>