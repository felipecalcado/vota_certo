<?php


/**
 * Base class that represents a query for the 'erro' table.
 *
 *
 *
 * @method ErroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ErroQuery orderByArquivo($order = Criteria::ASC) Order by the arquivo column
 * @method ErroQuery orderByLinha($order = Criteria::ASC) Order by the linha column
 * @method ErroQuery orderByMensagem($order = Criteria::ASC) Order by the mensagem column
 *
 * @method ErroQuery groupById() Group by the id column
 * @method ErroQuery groupByArquivo() Group by the arquivo column
 * @method ErroQuery groupByLinha() Group by the linha column
 * @method ErroQuery groupByMensagem() Group by the mensagem column
 *
 * @method ErroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ErroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ErroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Erro findOne(PropelPDO $con = null) Return the first Erro matching the query
 * @method Erro findOneOrCreate(PropelPDO $con = null) Return the first Erro matching the query, or a new Erro object populated from the query conditions when no match is found
 *
 * @method Erro findOneByArquivo(string $arquivo) Return the first Erro filtered by the arquivo column
 * @method Erro findOneByLinha(int $linha) Return the first Erro filtered by the linha column
 * @method Erro findOneByMensagem(string $mensagem) Return the first Erro filtered by the mensagem column
 *
 * @method array findById(int $id) Return Erro objects filtered by the id column
 * @method array findByArquivo(string $arquivo) Return Erro objects filtered by the arquivo column
 * @method array findByLinha(int $linha) Return Erro objects filtered by the linha column
 * @method array findByMensagem(string $mensagem) Return Erro objects filtered by the mensagem column
 *
 * @package    propel.generator.vota_certo.om
 */
abstract class BaseErroQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseErroQuery object.
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
            $modelName = 'Erro';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ErroQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ErroQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ErroQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ErroQuery) {
            return $criteria;
        }
        $query = new ErroQuery(null, null, $modelAlias);

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
     * @return   Erro|Erro[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ErroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ErroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Erro A model object, or null if the key is not found
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
     * @return                 Erro A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `arquivo`, `linha`, `mensagem` FROM `erro` WHERE `id` = :p0';
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
            $obj = new Erro();
            $obj->hydrate($row);
            ErroPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Erro|Erro[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Erro[]|mixed the list of results, formatted by the current formatter
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
     * @return ErroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ErroPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ErroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ErroPeer::ID, $keys, Criteria::IN);
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
     * @return ErroQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ErroPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ErroPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErroPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the arquivo column
     *
     * Example usage:
     * <code>
     * $query->filterByArquivo('fooValue');   // WHERE arquivo = 'fooValue'
     * $query->filterByArquivo('%fooValue%'); // WHERE arquivo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $arquivo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ErroQuery The current query, for fluid interface
     */
    public function filterByArquivo($arquivo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($arquivo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $arquivo)) {
                $arquivo = str_replace('*', '%', $arquivo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ErroPeer::ARQUIVO, $arquivo, $comparison);
    }

    /**
     * Filter the query on the linha column
     *
     * Example usage:
     * <code>
     * $query->filterByLinha(1234); // WHERE linha = 1234
     * $query->filterByLinha(array(12, 34)); // WHERE linha IN (12, 34)
     * $query->filterByLinha(array('min' => 12)); // WHERE linha >= 12
     * $query->filterByLinha(array('max' => 12)); // WHERE linha <= 12
     * </code>
     *
     * @param     mixed $linha The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ErroQuery The current query, for fluid interface
     */
    public function filterByLinha($linha = null, $comparison = null)
    {
        if (is_array($linha)) {
            $useMinMax = false;
            if (isset($linha['min'])) {
                $this->addUsingAlias(ErroPeer::LINHA, $linha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linha['max'])) {
                $this->addUsingAlias(ErroPeer::LINHA, $linha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErroPeer::LINHA, $linha, $comparison);
    }

    /**
     * Filter the query on the mensagem column
     *
     * Example usage:
     * <code>
     * $query->filterByMensagem('fooValue');   // WHERE mensagem = 'fooValue'
     * $query->filterByMensagem('%fooValue%'); // WHERE mensagem LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mensagem The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ErroQuery The current query, for fluid interface
     */
    public function filterByMensagem($mensagem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mensagem)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mensagem)) {
                $mensagem = str_replace('*', '%', $mensagem);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ErroPeer::MENSAGEM, $mensagem, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Erro $erro Object to remove from the list of results
     *
     * @return ErroQuery The current query, for fluid interface
     */
    public function prune($erro = null)
    {
        if ($erro) {
            $this->addUsingAlias(ErroPeer::ID, $erro->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
