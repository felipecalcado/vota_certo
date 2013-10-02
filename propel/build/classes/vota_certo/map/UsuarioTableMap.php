<?php



/**
 * This class defines the structure of the 'usuario' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vota_certo   #it can be any name.map
 */
class UsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'vota_certo   #it can be any name.map.UsuarioTableMap';

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
        $this->setName('usuario');
        $this->setPhpName('Usuario');
        $this->setClassname('Usuario');
        $this->setPackage('vota_certo   #it can be any name');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('usuario', 'Usuario', 'VARCHAR', true, 50, null);
        $this->addColumn('senha', 'Senha', 'VARCHAR', true, 20, null);
        $this->addForeignKey('id_cidade', 'IdCidade', 'INTEGER', 'cidade', 'id', false, null, null);
        $this->addColumn('admin', 'Admin', 'BOOLEAN', false, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cidade', 'Cidade', RelationMap::MANY_TO_ONE, array('id_cidade' => 'id', ), null, null);
    } // buildRelations()

} // UsuarioTableMap
