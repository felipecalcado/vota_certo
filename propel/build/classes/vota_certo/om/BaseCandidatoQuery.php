<?php


/**
 * Base class that represents a query for the 'candidato' table.
 *
 *
 *
 * @method CandidatoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CandidatoQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method CandidatoQuery orderByIdCidade($order = Criteria::ASC) Order by the id_cidade column
 * @method CandidatoQuery orderByPartido($order = Criteria::ASC) Order by the partido column
 * @method CandidatoQuery orderByCargo($order = Criteria::ASC) Order by the cargo column
 * @method CandidatoQuery orderByHistorico($order = Criteria::ASC) Order by the historico column
 *
 * @method CandidatoQuery groupById() Group by the id column
 * @method CandidatoQuery groupByNome() Group by the nome column
 * @method CandidatoQuery groupByIdCidade() Group by the id_cidade column
 * @method CandidatoQuery groupByPartido() Group by the partido column
 * @method CandidatoQuery groupByCargo() Group by the cargo column
 * @method CandidatoQuery groupByHistorico() Group by the historico column
 *
 * @method CandidatoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CandidatoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CandidatoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CandidatoQuery leftJoinCidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidade relation
 * @method CandidatoQuery rightJoinCidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidade relation
 * @method CandidatoQuery innerJoinCidade($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidade relation
 *
 * @method Candidato findOne(PropelPDO $con = null) Return the first Candidato matching the query
 * @method Candidato findOneOrCreate(PropelPDO $con = null) Return the first Candidato matching the query, or a new Candidato object populated from the query conditions when no match is found
 *
 * @method Candidato findOneByNome(string $nome) Return the first Candidato filtered by the nome column
 * @method Candidato findOneByIdCidade(int $id_cidade) Return the first Candidato filtered by the id_cidade column
 * @method Candidato findOneByPartido(string $partido) Return the first Candidato filtered by the partido column
 * @method Candidato findOneByCargo(string $cargo) Return the first Candidato filtered by the cargo column
 * @method Candidato findOneByHistorico(string $historico) Return the first Candidato filtered by the historico column
 *
 * @method array findById(int $id) Return Candidato objects filtered by the id column
 * @method array findByNome(string $nome) Return Candidato objects filtered by the nome column
 * @method array findByIdCidade(int $id_cidade) Return Candidato objects filtered by the id_cidade column
 * @method array findByPartido(string $partido) Return Candidato objects filtered by the partido column
 * @method array findByCargo(string $cargo) Return Candidato objects filtered by the cargo column
 * @method array findByHistorico(string $historico) Return Candidato objects filtered by the historico column
 *
 * @package    propel.generator.vota_certo.om
 */
abstract class BaseCandidatoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCandidatoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'vota_certo';
        }
        if (null === $modelName) {
            $modelName = 'Candidato';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CandidatoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CandidatoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CandidatoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CandidatoQuery) {
            return $criteria;
        }
        $query = new CandidatoQuery(null, null, $modelAlias);

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
     * @return   Candidato|Candidato[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CandidatoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CandidatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Candidato A model object, or null if the key is not found
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
     * @return                 Candidato A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nome`, `id_cidade`, `partido`, `cargo`, `historico` FROM `candidato` WHERE `id` = :p0';
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
            $obj = new Candidato();
            $obj->hydrate($row);
            CandidatoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Candidato|Candidato[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Candidato[]|mixed the list of results, formatted by the current formatter
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
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CandidatoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CandidatoPeer::ID, $keys, Criteria::IN);
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
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CandidatoPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CandidatoPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CandidatoPeer::ID, $id, $comparison);
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
     * @return CandidatoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CandidatoPeer::NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the id_cidade column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCidade(1234); // WHERE id_cidade = 1234
     * $query->filterByIdCidade(array(12, 34)); // WHERE id_cidade IN (12, 34)
     * $query->filterByIdCidade(array('min' => 12)); // WHERE id_cidade >= 12
     * $query->filterByIdCidade(array('max' => 12)); // WHERE id_cidade <= 12
     * </code>
     *
     * @see       filterByCidade()
     *
     * @param     mixed $idCidade The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function filterByIdCidade($idCidade = null, $comparison = null)
    {
        if (is_array($idCidade)) {
            $useMinMax = false;
            if (isset($idCidade['min'])) {
                $this->addUsingAlias(CandidatoPeer::ID_CIDADE, $idCidade['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCidade['max'])) {
                $this->addUsingAlias(CandidatoPeer::ID_CIDADE, $idCidade['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CandidatoPeer::ID_CIDADE, $idCidade, $comparison);
    }

    /**
     * Filter the query on the partido column
     *
     * Example usage:
     * <code>
     * $query->filterByPartido('fooValue');   // WHERE partido = 'fooValue'
     * $query->filterByPartido('%fooValue%'); // WHERE partido LIKE '%fooValue%'
     * </code>
     *
     * @param     string $partido The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function filterByPartido($partido = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($partido)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $partido)) {
                $partido = str_replace('*', '%', $partido);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CandidatoPeer::PARTIDO, $partido, $comparison);
    }

    /**
     * Filter the query on the cargo column
     *
     * Example usage:
     * <code>
     * $query->filterByCargo('fooValue');   // WHERE cargo = 'fooValue'
     * $query->filterByCargo('%fooValue%'); // WHERE cargo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function filterByCargo($cargo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cargo)) {
                $cargo = str_replace('*', '%', $cargo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CandidatoPeer::CARGO, $cargo, $comparison);
    }

    /**
     * Filter the query on the historico column
     *
     * Example usage:
     * <code>
     * $query->filterByHistorico('fooValue');   // WHERE historico = 'fooValue'
     * $query->filterByHistorico('%fooValue%'); // WHERE historico LIKE '%fooValue%'
     * </code>
     *
     * @param     string $historico The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function filterByHistorico($historico = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($historico)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $historico)) {
                $historico = str_replace('*', '%', $historico);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CandidatoPeer::HISTORICO, $historico, $comparison);
    }

    /**
     * Filter the query by a related Cidade object
     *
     * @param   Cidade|PropelObjectCollection $cidade The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CandidatoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCidade($cidade, $comparison = null)
    {
        if ($cidade instanceof Cidade) {
            return $this
                ->addUsingAlias(CandidatoPeer::ID_CIDADE, $cidade->getId(), $comparison);
        } elseif ($cidade instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CandidatoPeer::ID_CIDADE, $cidade->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCidade() only accepts arguments of type Cidade or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cidade relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function joinCidade($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cidade');

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
            $this->addJoinObject($join, 'Cidade');
        }

        return $this;
    }

    /**
     * Use the Cidade relation Cidade object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CidadeQuery A secondary query class using the current class as primary query
     */
    public function useCidadeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCidade($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cidade', 'CidadeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Candidato $candidato Object to remove from the list of results
     *
     * @return CandidatoQuery The current query, for fluid interface
     */
    public function prune($candidato = null)
    {
        if ($candidato) {
            $this->addUsingAlias(CandidatoPeer::ID, $candidato->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
