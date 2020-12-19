<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Producto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get producto by idProductos
     */
    function get_producto($idProductos)
    {
        return $this->db->get_where('productos', array('idProductos' => $idProductos))->row_array();
    }

    function get_nombre($idproducto)
    {
        $query  = $this->db->select('NombreProducto')
            ->from('productos')
            ->where('idProductos', $idproducto)
            ->get();
        return $query->row_array();
    }

    function get_precio($idproducto)
    {
        $query = $this->db->select('Precio')
            ->from('productos')
            ->where('idProductos', $idproducto)
            ->get();
        return $query->row_array();
    }
    /*
     * Get all productos
     */
    function get_all_productos()
    {
        $this->db->order_by('idProductos', 'asc');
        return $this->db->get('productos')->result_array();
    }

    /*
     * function to add new producto
     */
    function add_producto($params)
    {
        $this->db->insert('productos', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update producto
     */
    function update_producto($idProductos, $params)
    {
        $this->db->where('idProductos', $idProductos);
        return $this->db->update('productos', $params);
    }

    /*
     * function to delete producto
     */
    function delete_producto($idProductos)
    {
        return $this->db->delete('productos', array('idProductos' => $idProductos));
    }
}
