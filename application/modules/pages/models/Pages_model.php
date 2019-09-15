<?php

class Pages_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'array']);
		// $this->load->library(['']);
	}

	/**
	 * @return product as a string
	 */
	public function get_products($slug = FALSE) {
		if ($slug === FALSE) {
			$this->db->order_by('products.name');
            $query = $this->db->get_where('products', ['status' => 1]);
            return $query->result();
        }

        $query = $this->db->get_where('products', ['slug' => $slug]);
        return $query->row();
	}

	/**
	 * @return new products
	 */
	public function get_newproducts($slug = FALSE) {
		if ($slug === FALSE) {
			$this->db->where('date_created BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
			$query = $this->db->get('products')->result();
			return $query;
		}

	}

	public function get($id) {

		$results = $this->db->get_where('products', ['id' => $id])->result();

		$result = $results[0];

		return $result;
	}

	/**
	 * Get the shipment locations
	 *
	 * @return string
	 *
	 */
	public function get_shipments() {
		$this->db->order_by('shipment.ship_to', 'asc');
		$query = $this->db->get('shipment');
		return $query->result();
	}

	/**
	 * Get the counties
	 *
	 * @return string
	 *
	 */
	public function get_counties() {
		$this->db->order_by('counties.county_code', 'asc');
        $query = $this->db->get('counties')->result();
        return $query;
	}

	/**
	 * @return categories
	 */
	public function get_categories($slug = FALSE) {
		if ($slug === FALSE) {
			$this->db->order_by('categories.category', 'asc');
			$query = $this->db->get('categories')->result();
			return $query;
		}

		$query = $this->db->get('categories')->row();
		return $query;
			
	}

	/**
	 * @return subcategories
	 */
	public function get_subcategories($slug = FALSE) {
		if ($slug === FALSE) {
			$this->db->order_by('subcategories.subcategory', 'asc');
			$query = $this->db->get('subcategories')->result();
			return $query;
		}

		$query = $this->db->get('subcategories')->row();
		return $query;
			
	}

	/**
	 * @return search results
	 *
	 * @param string
	 */
	public function search($product) {
		$array = ['name' => $product, 'description' => $product, 'categories' => $product, 'tags' => $product, 'sale_price' => $product, 'wholesale_price' => $product];
		$this->db->or_like($array);
		$query = $this->db->get('products')->result();
		return $query;
	}

	/**
	 * @return customer orders
	 *
	 * @param string
	 */
	public function my_orders($order_id = FALSE) {
		if ($order_id === FALSE) {
			$customer_id = $this->ion_auth->user()->row()->id;
			$query = $this->db->get_where('orders', ['customer_id' => $customer_id])->result();
			return $query;
		}

		$query = $this->db->get_where('orders', ['order_id' => $order_id])->row();
		return $query;
	}

	/**
	 * @return customer's wishlist 
	 *
	 * @param string 
	 */
	public function my_wishlist($wishlist_code = FALSE) {
		if ($wishlist_code === FALSE) {
			$customer_id = $this->ion_auth->user()->row()->id;
			$query = $this->db->get_where('wishlist', ['customer_id' => $customer_id])->result();
			return $query;
		}

		$query = $this->db->get_where('wishlist', ['wishlist_code' => $wishlist_code])->row();
		return $query;
	}
}