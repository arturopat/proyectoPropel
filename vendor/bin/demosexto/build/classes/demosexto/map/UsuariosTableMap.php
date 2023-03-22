<?php



/**
 * This class defines the structure of the 'usuarios' table.
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
class UsuariosTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'demosexto.map.UsuariosTableMap';

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
        $this->setName('usuarios');
        $this->setPhpName('Usuarios');
        $this->setClassname('Usuarios');
        $this->setPackage('demosexto');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'IdUsuarios', 'INTEGER', true, null, null);
        $this->addColumn('nombres', 'Nombres', 'VARCHAR', true, 100, null);
        $this->addColumn('apellidos', 'LosApellidos', 'VARCHAR', true, 100, null);
        $this->addColumn('correo', 'Correo', 'VARCHAR', true, 100, null);
        $this->addColumn('telefono', 'Telefono', 'VARCHAR', true, 15, null);
        $this->addColumn('vacunado', 'EstaVacunado', 'ENUM', true, 3, null);
        $this->getColumn('vacunado', false)->setValueSet(array (
  0 => 'No',
  1 => 'Si',
));
        $this->addColumn('genero', 'QueGenero', 'ENUM', true, 15, null);
        $this->getColumn('genero', false)->setValueSet(array (
  0 => 'Mujer',
  1 => 'Hombre',
));
        // validators
        $this->addValidator('nombres', 'required', 'propel.validator.RequiredValidator', '', 'No olvides poner tu nombre');
        $this->addValidator('apellidos', 'required', 'propel.validator.RequiredValidator', '', 'El campo APELLIDOS no puede ser vacío');
        $this->addValidator('telefono', 'required', 'propel.validator.RequiredValidator', '', 'El campo TELÉFONO no puede ser vacío');
        $this->addValidator('telefono', 'match', 'propel.validator.MatchValidator', '/^\d{10}$/', 'El campo TELÉFONO debe tener exactamente 10 dígitos');
        $this->addValidator('telefono', 'unique', 'propel.validator.UniqueValidator', '', 'El número de teléfono ya está registrado con otro usuario');
        $this->addValidator('correo', 'required', 'propel.validator.RequiredValidator', '', 'El campo CORREO ELECTRÓNICO no puede ser vacío así que ponte las pilas');
        $this->addValidator('correo', 'unique', 'propel.validator.UniqueValidator', '', 'El CORREO ELECTRÓNICO ingresado ya está registrado con otro usuario no te hagas');
        $this->addValidator('correo', 'match', 'propel.validator.MatchValidator', '/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9])+(\.[a-zA-Z0-9_-]+)+$/', 'Ingrese un CORREO ELECTRÓNICO válido.');
        $this->addValidator('correo', 'minLength', 'propel.validator.MinLengthValidator', '5', 'El CORREO ELECTRÓNICO no puede ser menor a 5 caracteres');
        $this->addValidator('correo', 'maxLength', 'propel.validator.MaxLengthValidator', '150', 'El CORREO ELECTRÓNICO no puede ser mayor a 150 caracteres');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Ventas', 'Ventas', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario_comprador', ), null, null, 'Ventass');
    } // buildRelations()

} // UsuariosTableMap
