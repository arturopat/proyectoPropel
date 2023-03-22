<?php



/**
 * This class defines the structure of the 'productos' table.
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
class ProductosTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'demosexto.map.ProductosTableMap';

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
        $this->setName('productos');
        $this->setPhpName('Productos');
        $this->setClassname('Productos');
        $this->setPackage('demosexto');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'IdProductos', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 100, null);
        $this->addColumn('clasificacion', 'Clasificacion', 'ENUM', true, 15, null);
        $this->getColumn('clasificacion', false)->setValueSet(array (
  0 => 'abarrotes',
  1 => 'higiene',
  2 => 'salchichonería',
  3 => 'limpieza',
  4 => 'verduras',
));
        $this->addColumn('precio_compra', 'PrecioCompra', 'DECIMAL', true, 50, null);
        $this->addColumn('precio_venta', 'PrecioVenta', 'DECIMAL', true, 50, null);
        $this->addColumn('stock', 'Stock', 'INTEGER', true, null, null);
        // validators
        $this->addValidator('nombre', 'required', 'propel.validator.RequiredValidator', '', 'Debes de Poner un Nombre');
        $this->addValidator('precio_compra', 'required', 'propel.validator.RequiredValidator', '', 'Debes de Poner un Precio de Compra');
        $this->addValidator('precio_compra', 'minValue', 'propel.validator.MinValueValidator', '0', 'El Precio de Compra debe ser mayor que cero');
        $this->addValidator('precio_venta', 'required', 'propel.validator.RequiredValidator', '', 'Debes de Poner un Precio de Venta');
        $this->addValidator('precio_venta', 'minValue', 'propel.validator.MinValueValidator', '0', 'El Precio de Venta debe ser mayor que cero');
        $this->addValidator('stock', 'required', 'propel.validator.RequiredValidator', '', 'Debes de Poner una Cantidad en Stock');
        $this->addValidator('stock', 'minValue', 'propel.validator.MinValueValidator', '0', 'El Stock debe ser mayor o igual que cero');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ProductosTableMap
