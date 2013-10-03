<?php



/**
 * This class defines the structure of the 'cidade' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vota_certo.map
 */
class CidadeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'vota_certo.map.CidadeTableMap';

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
        $this->setName('cidade');
        $this->setPhpName('Cidade');
        $this->setClassname('Cidade');
        $this->setPackage('vota_certo');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', true, 50, null);
        $this->addForeignKey('id_estado', 'IdEstado', 'INTEGER', 'estado', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Estado', 'Estado', RelationMap::MANY_TO_ONE, array('id_estado' => 'id', ), null, null);
        $this->addRelation('Candidato', 'Candidato', RelationMap::ONE_TO_MANY, array('id' => 'id_cidade', ), null, null, 'Candidatos');
        $this->addRelation('Usuario', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'id_cidade', ), null, null, 'Usuarios');
    } // buildRelations()

} // CidadeTableMap
