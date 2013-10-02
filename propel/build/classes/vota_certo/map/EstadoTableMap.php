<?php



/**
 * This class defines the structure of the 'estado' table.
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
class EstadoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'vota_certo   #it can be any name.map.EstadoTableMap';

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
        $this->setName('estado');
        $this->setPhpName('Estado');
        $this->setClassname('Estado');
        $this->setPackage('vota_certo   #it can be any name');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', true, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cidade', 'Cidade', RelationMap::ONE_TO_MANY, array('id' => 'id_estado', ), null, null, 'Cidades');
    } // buildRelations()

} // EstadoTableMap