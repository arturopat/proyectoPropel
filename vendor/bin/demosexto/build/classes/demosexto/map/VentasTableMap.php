<?php



/**
 * This class defines the structure of the 'ventas' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.demosexto.map
 */
class VentasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'demosexto.map.VentasTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('ventas');
        $this->setPhpName('Ventas');
        $this->setClassname('Ventas');
        $this->setPackage('demosexto');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'IdVentas', 'INTEGER', true, null, null);
        $this->addForeignKey('id_usuario_comprador', 'IdUsuarioComprador', 'INTEGER', 'usuarios', 'id', true, null, null);
        $this->addColumn('fecha_venta', 'FechaVenta', 'DATE', true, null, null);
        $this->addColumn('costo_total', 'CostoTotal', 'DECIMAL', true, 50, null);
        // validators
        $this->addValidator('costo_total', 'required', 'propel.validator.RequiredValidator', '', 'El campo COSTO TOTAL no puede estar vacío');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UsuarioComprador', 'Usuarios', RelationMap::MANY_TO_ONE, array('id_usuario_comprador' => 'id', ), null, null);
    } // buildRelations()

} // VentasTableMap
