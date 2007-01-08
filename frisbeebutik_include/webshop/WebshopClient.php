<?php
/**
 * WebshopClient
 *
 * @author		Lars Olesen <lars@legestue.net>
 * @version	2.0
 * @require	http://scripts.incutio.com/xmlrpc/
 */

class WebshopClient {
	/**
	 * Instance of IXR_Client class
	 * @access	private
	 * @var		object	IXR_Client
	 */
	var $client;

	/**
	 * Credentials til at hente oplysninger fra serveren
	 * @access	private
	 * @var		struct	members (private_key, session_id)
	 */
	var $credentials;

	/**
	 * Webshopclient constructor
	 * @param	struct	$credentials (private_key, optional session_id) 
	 * @param	boolean	$debug
	 * @access	public
	 */
	function WebshopClient($credentials, $debug = false) {
		WebshopClient::__construct($credentials, $debug);
	}
	
	function __construct($credentials, $debug) {
		session_start();
  
		// url til serveren
		$url = 'http://www.intraface.dk/xmlrpc/webshop/server2.php'; 
		

		$this->credentials = $credentials;

		if (empty($this->credentials['session_id'])) {
			$this->credentials['session_id'] = md5(session_id());
		} 

		// starter de nødvendige ting op
		$this->client= new IXR_Client($url);
		$this->client->debug=$debug;    
	}
  
	/***************************************************************************
	 * Methods to get products
	 **************************************************************************/
  
	/**
	 * Returns an array of products
	 *
	 * @param	string	$search
	 * @return	array	With products
	 * @access	public
	 */
	function getProducts($search = array()) {

		if (!$this->client->query('products.getList', $this->credentials, $search)) {
			trigger_error($this->client->getErrorCode(). ' : '.$this->client->getErrorMessage());
			return false;
		}
		return $this->client->getResponse();
	}

	/**
	 * Returns an array with the individual product
	 *
	 * @param	integer	$id
	 * @return	array	With product details
	 * @access	public
	 */
	function getProduct($id) {
		if (!$this->client->query('products.getProduct', $this->credentials, $id)) {
			trigger_error($this->client->getErrorCode(). ' : '.$this->client->getErrorMessage());
			return false;
		}
		return $this->client->getResponse();
	}  

	function getRelatedProducts($id) {
		if (!$this->client->query('products.getRelatedProducts', $this->credentials, $id)) {
			trigger_error($this->client->getErrorCode(). ' : '.$this->client->getErrorMessage());
			return false;
		}
		return $this->client->getResponse();
	}    
  
  /***************************************************************************
   * Metoder til selve indkøbskurven
   **************************************************************************/
 
  function addBasket($product_id) {
		if (!$this->client->query('basket.add', $this->credentials, $product_id)) {
  		trigger_error($this->client->getErrorCode(). ' : '.$this->client->getErrorMessage());
    }
    return true;
	}
  
	function changeBasket($product_id, $quantity) {

		if (!$this->client->query('basket.change', $this->credentials, $product_id, $quantity)) {
			//trigger_error('An error occurred - '.$this->client->getErrorCode().":".$this->client->getErrorMessage());
			return 0;
		}
		return true;
	}


  function getBasket() {
		if (!$this->client->query('basket.get', $this->credentials)) {
  		trigger_error($this->client->getErrorCode(). ' : ' .$this->client->getErrorMessage());
    }
		return $this->client->getResponse();    
  }

  /***************************************************************************
   * Metoder til at placere ordren
   **************************************************************************/

	/**
   * Funktionen sender ordren til systemet
   *
   * @param $order (array)
   * $order['company'] = $_POST['navn'];
   * $order['contactname'] = $_POST['navn'];
	 * $order['address'] = $_POST['adresse'];
	 * $order['postalcode'] = $_POST['postnr'];
	 * $order['town'] = $_POST['bynavn'];
	 * $order['email'] = $_POST['email'];
	 * $order['phone'] = $_POST['telefonnummer'];
   * @access public		
   */
   
	function placeOrder($order) {
		if (!$this->client->query('basket.placeOrder', $this->credentials, $order)) {
			trigger_error('An error occurred - '.$this->client->getErrorCode().":".$this->client->getErrorMessage());
		}
    return 1;
  }
  
}


?>