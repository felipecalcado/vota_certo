<?php


/**
 * Base class that represents a query for the 'cidade' table.
 *
 *
 *
 * @method CidadeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CidadeQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method CidadeQuery orderByIdEstado($order = Criteria::ASC) Order by the id_estado column
 *
 * @method CidadeQuery groupById() Group by the id column
 * @method CidadeQuery groupByNome() Group by the nome column
 * @method CidadeQuery groupByIdEstado() Group by the id_estado column
 *
 * @method CidadeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CidadeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CidadeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CidadeQuery leftJoinEstado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Estado relation
 * @method CidadeQuery rightJoinEstado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Estado relation
 * @method CidadeQuery innerJoinEstado($relationAlias = null) Adds a INNER JOIN clause to the query using the Estado relation
 *
 * @method CidadeQuery leftJoinCandidato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Candidato relation
 * @method CidadeQuery rightJoinCandidato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Candidato relation
 * @method CidadeQuery innerJoinCandidato($relationAlias = null) Adds a INNER JOIN clause to the query using the Candidato relation
 *
 * @method CidadeQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method CidadeQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method CidadeQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method Cidade findOne(PropelPDO $con = null) Return the first Cidade matching the query
 * @method Cidade findOneOrCreate(PropelPDO $con = null) Return the first Cidade matching the query, or a new Cidade object populated from the query conditions when no match is found
 *
 * @method Cidade findOneByNome(string $nome) Return the first Cidade filtered by the nome column
 * @method Cidade findOneByIdEstado(int $id_estado) Return the first Cidade filtered by the id_estado column
 *
 * @method array findById(int $id) Return Cidade objects filtered by the id column
 * @method array findByNome(string $nome) Return Cidade objects filtered by the nome column
 * @method array findByIdEstado(int $id_estado) Return Cidade objects filtered by the id_estado column
 *
 * @package    propel.generator.vota_certo   #it can be any name.om
 */
abstract class BaseCidadeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCidadeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'vota_certo   #it can be any name';
        }
        if (null === $modelName) {
            $modelName = 'Cidade';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CidadeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CidadeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CidadeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CidadeQuery) {
            return $criteria;
        }
        $query = new CidadeQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Cidade|Cidade[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CidadePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CidadePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Cidade A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Cidade A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nome`, `id_estado` FROM `cidade` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Cidade();
            $obj->hydrate($row);
            CidadePeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Cidade|Cidade[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Cidade[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CidadePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CidadePeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CidadePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CidadePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CidadePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nome)) {
                $nome = str_replace('*', '%', $nome);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CidadePeer::NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the id_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEstado(1234); // WHERE id_estado = 1234
     * $query->filterByIdEstado(array(12, 34)); // WHERE id_estado IN (12, 34)
     * $query->filterByIdEstado(array('min' => 12)); // WHERE id_estado >= 12
     * $query->filterByIdEstado(array('max' => 12)); // WHERE id_estado <= 12
     * </code>
     *
     * @see       filterByEstado()
     *
     * @param     mixed $idEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function filterByIdEstado($idEstado = null, $comparison = null)
    {
        if (is_array($idEstado)) {
            $useMinMax = false;
            if (isset($idEstado['min'])) {
                $this->addUsingAlias(CidadePeer::ID_ESTADO, $idEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEstado['max'])) {
                $this->addUsingAlias(CidadePeer::ID_ESTADO, $idEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CidadePeer::ID_ESTADO, $idEstado, $comparison);
    }

    /**
     * Filter the query by a related Estado object
     *
     * @param   Estado|PropelObjectCollection $estado The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CidadeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEstado($estado, $comparison = null)
    {
        if ($estado instanceof Estado) {
            return $this
                ->addUsingAlias(CidadePeer::ID_ESTADO, $estado->getId(), $comparison);
        } elseif ($estado instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CidadePeer::ID_ESTADO, $estado->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEstado() only accepts arguments of type Estado or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Estado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function joinEstado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Estado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Estado');
        }

        return $this;
    }

    /**
     * Use the Estado relation Estado object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EstadoQuery A secondary query class using the current class as primary query
     */
    public function useEstadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEstado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Estado', 'EstadoQuery');
    }

    /**
     * Filter the query by a related Candidato object
     *
     * @param   Candidato|PropelObjectCollection $candidato  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CidadeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCandidato($candidato, $comparison = null)
    {
        if ($candidato instanceof Candidato) {
            return $this
                ->addUsingAlias(CidadePeer::ID, $candidato->getIdCidade(), $comparison);
        } elseif ($candidato instanceof PropelObjectCollection) {
            return $this
                ->useCandidatoQuery()
                ->filterByPrimaryKeys($candidato->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCandidato() only accepts arguments of type Candidato or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Candidato relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function joinCandidato($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Candidato');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Candidato');
        }

        return $this;
    }

    /**
     * Use the Candidato relation Candidato object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CandidatoQuery A secondary query class using the current class as primary query
     */
    public function useCandidatoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCandidato($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Candidato', 'CandidatoQuery');
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CidadeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(CidadePeer::ID, $usuario->getIdCidade(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            return $this
                ->useUsuarioQuery()
                ->filterByPrimaryKeys($usuario->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function joinUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuario');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Usuario');
        }

        return $this;
    }

    /**
     * Use the Usuario relation Usuario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsuarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Cidade $cidade Object to remove from the list of results
     *
     * @return CidadeQuery The current query, for fluid interface
     */
    public function prune($cidade = null)
    {
        if ($cidade) {
            $this->addUsingAlias(CidadePeer::ID, $cidade->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
