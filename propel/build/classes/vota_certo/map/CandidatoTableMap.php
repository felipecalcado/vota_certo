<?php



/**
 * This class defines the structure of the 'candidato' table.
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
class CandidatoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'vota_certo.map.CandidatoTableMap';

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
        $this->setName('candidato');
        $this->setPhpName('Candidato');
        $this->setClassname('Candidato');
        $this->setPackage('vota_certo');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', true, 30, null);
        $this->addForeignKey('id_cidade', 'IdCidade', 'INTEGER', 'cidade', 'id', false, null, null);
        $this->addColumn('partido', 'Partido', 'VARCHAR', true, 8, null);
        $this->addColumn('cargo', 'Cargo', 'VARCHAR', true, 15, null);
        $this->addColumn('historico', 'Historico', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cidade', 'Cidade', RelationMap::MANY_TO_ONE, array('id_cidade' => 'id', ), null, null);
    } // buildRelations()

} // CandidatoTableMap
