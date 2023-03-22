<?php


/**
 * Base class that represents a query for the 'usuarios' table.
 *
 *
 *
 * @method UsuariosQuery orderByIdUsuarios($order = Criteria::ASC) Order by the id column
 * @method UsuariosQuery orderByNombres($order = Criteria::ASC) Order by the nombres column
 * @method UsuariosQuery orderByLosApellidos($order = Criteria::ASC) Order by the apellidos column
 * @method UsuariosQuery orderByCorreo($order = Criteria::ASC) Order by the correo column
 * @method UsuariosQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method UsuariosQuery orderByEstaVacunado($order = Criteria::ASC) Order by the vacunado column
 * @method UsuariosQuery orderByQueGenero($order = Criteria::ASC) Order by the genero column
 *
 * @method UsuariosQuery groupByIdUsuarios() Group by the id column
 * @method UsuariosQuery groupByNombres() Group by the nombres column
 * @method UsuariosQuery groupByLosApellidos() Group by the apellidos column
 * @method UsuariosQuery groupByCorreo() Group by the correo column
 * @method UsuariosQuery groupByTelefono() Group by the telefono column
 * @method UsuariosQuery groupByEstaVacunado() Group by the vacunado column
 * @method UsuariosQuery groupByQueGenero() Group by the genero column
 *
 * @method UsuariosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UsuariosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UsuariosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UsuariosQuery leftJoinVentas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ventas relation
 * @method UsuariosQuery rightJoinVentas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ventas relation
 * @method UsuariosQuery innerJoinVentas($relationAlias = null) Adds a INNER JOIN clause to the query using the Ventas relation
 *
 * @method Usuarios findOne(PropelPDO $con = null) Return the first Usuarios matching the query
 * @method Usuarios findOneOrCreate(PropelPDO $con = null) Return the first Usuarios matching the query, or a new Usuarios object populated from the query conditions when no match is found
 *
 * @method Usuarios findOneByNombres(string $nombres) Return the first Usuarios filtered by the nombres column
 * @method Usuarios findOneByLosApellidos(string $apellidos) Return the first Usuarios filtered by the apellidos column
 * @method Usuarios findOneByCorreo(string $correo) Return the first Usuarios filtered by the correo column
 * @method Usuarios findOneByTelefono(string $telefono) Return the first Usuarios filtered by the telefono column
 * @method Usuarios findOneByEstaVacunado(int $vacunado) Return the first Usuarios filtered by the vacunado column
 * @method Usuarios findOneByQueGenero(int $genero) Return the first Usuarios filtered by the genero column
 *
 * @method array findByIdUsuarios(int $id) Return Usuarios objects filtered by the id column
 * @method array findByNombres(string $nombres) Return Usuarios objects filtered by the nombres column
 * @method array findByLosApellidos(string $apellidos) Return Usuarios objects filtered by the apellidos column
 * @method array findByCorreo(string $correo) Return Usuarios objects filtered by the correo column
 * @method array findByTelefono(string $telefono) Return Usuarios objects filtered by the telefono column
 * @method array findByEstaVacunado(int $vacunado) Return Usuarios objects filtered by the vacunado column
 * @method array findByQueGenero(int $genero) Return Usuarios objects filtered by the genero column
 *
 * @package    propel.generator.demosexto.om
 */
abstract class BaseUsuariosQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUsuariosQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'demosexto';
        }
        if (null === $modelName) {
            $modelName = 'Usuarios';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsuariosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UsuariosQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsuariosQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsuariosQuery) {
            return $criteria;
        }
        $query = new UsuariosQuery(null, null, $modelAlias);

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
     * @return   Usuarios|Usuarios[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsuariosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsuariosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Usuarios A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdUsuarios($key, $con = null)
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
     * @return                 Usuarios A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombres`, `apellidos`, `correo`, `telefono`, `vacunado`, `genero` FROM `usuarios` WHERE `id` = :p0';
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
            $obj = new Usuarios();
            $obj->hydrate($row);
            UsuariosPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Usuarios|Usuarios[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Usuarios[]|mixed the list of results, formatted by the current formatter
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
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuariosPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuariosPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUsuarios(1234); // WHERE id = 1234
     * $query->filterByIdUsuarios(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByIdUsuarios(array('min' => 12)); // WHERE id >= 12
     * $query->filterByIdUsuarios(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $idUsuarios The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByIdUsuarios($idUsuarios = null, $comparison = null)
    {
        if (is_array($idUsuarios)) {
            $useMinMax = false;
            if (isset($idUsuarios['min'])) {
                $this->addUsingAlias(UsuariosPeer::ID, $idUsuarios['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUsuarios['max'])) {
                $this->addUsingAlias(UsuariosPeer::ID, $idUsuarios['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::ID, $idUsuarios, $comparison);
    }

    /**
     * Filter the query on the nombres column
     *
     * Example usage:
     * <code>
     * $query->filterByNombres('fooValue');   // WHERE nombres = 'fooValue'
     * $query->filterByNombres('%fooValue%'); // WHERE nombres LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombres The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByNombres($nombres = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombres)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombres)) {
                $nombres = str_replace('*', '%', $nombres);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::NOMBRES, $nombres, $comparison);
    }

    /**
     * Filter the query on the apellidos column
     *
     * Example usage:
     * <code>
     * $query->filterByLosApellidos('fooValue');   // WHERE apellidos = 'fooValue'
     * $query->filterByLosApellidos('%fooValue%'); // WHERE apellidos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $losApellidos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByLosApellidos($losApellidos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($losApellidos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $losApellidos)) {
                $losApellidos = str_replace('*', '%', $losApellidos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::APELLIDOS, $losApellidos, $comparison);
    }

    /**
     * Filter the query on the correo column
     *
     * Example usage:
     * <code>
     * $query->filterByCorreo('fooValue');   // WHERE correo = 'fooValue'
     * $query->filterByCorreo('%fooValue%'); // WHERE correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $correo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByCorreo($correo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($correo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $correo)) {
                $correo = str_replace('*', '%', $correo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::CORREO, $correo, $comparison);
    }

    /**
     * Filter the query on the telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%'); // WHERE telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefono The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $telefono)) {
                $telefono = str_replace('*', '%', $telefono);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the vacunado column
     *
     * @param     mixed $estaVacunado The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByEstaVacunado($estaVacunado = null, $comparison = null)
    {
        if (is_scalar($estaVacunado)) {
            $estaVacunado = UsuariosPeer::getSqlValueForEnum(UsuariosPeer::VACUNADO, $estaVacunado);
        } elseif (is_array($estaVacunado)) {
            $convertedValues = array();
            foreach ($estaVacunado as $value) {
                $convertedValues[] = UsuariosPeer::getSqlValueForEnum(UsuariosPeer::VACUNADO, $value);
            }
            $estaVacunado = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::VACUNADO, $estaVacunado, $comparison);
    }

    /**
     * Filter the query on the genero column
     *
     * @param     mixed $queGenero The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuariosQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByQueGenero($queGenero = null, $comparison = null)
    {
        if (is_scalar($queGenero)) {
            $queGenero = UsuariosPeer::getSqlValueForEnum(UsuariosPeer::GENERO, $queGenero);
        } elseif (is_array($queGenero)) {
            $convertedValues = array();
            foreach ($queGenero as $value) {
                $convertedValues[] = UsuariosPeer::getSqlValueForEnum(UsuariosPeer::GENERO, $value);
            }
            $queGenero = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosPeer::GENERO, $queGenero, $comparison);
    }

    /**
     * Filter the query by a related Ventas object
     *
     * @param   Ventas|PropelObjectCollection $ventas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsuariosQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVentas($ventas, $comparison = null)
    {
        if ($ventas instanceof Ventas) {
            return $this
                ->addUsingAlias(UsuariosPeer::ID, $ventas->getIdUsuarioComprador(), $comparison);
        } elseif ($ventas instanceof PropelObjectCollection) {
            return $this
                ->useVentasQuery()
                ->filterByPrimaryKeys($ventas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVentas() only accepts arguments of type Ventas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ventas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function joinVentas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ventas');

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
            $this->addJoinObject($join, 'Ventas');
        }

        return $this;
    }

    /**
     * Use the Ventas relation Ventas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   VentasQuery A secondary query class using the current class as primary query
     */
    public function useVentasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVentas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ventas', 'VentasQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Usuarios $usuarios Object to remove from the list of results
     *
     * @return UsuariosQuery The current query, for fluid interface
     */
    public function prune($usuarios = null)
    {
        if ($usuarios) {
            $this->addUsingAlias(UsuariosPeer::ID, $usuarios->getIdUsuarios(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
