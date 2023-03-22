<?php


/**
 * Base class that represents a query for the 'ventas' table.
 *
 *
 *
 * @method VentasQuery orderByIdVentas($order = Criteria::ASC) Order by the id column
 * @method VentasQuery orderByIdUsuarioComprador($order = Criteria::ASC) Order by the id_usuario_comprador column
 * @method VentasQuery orderByFechaVenta($order = Criteria::ASC) Order by the fecha_venta column
 * @method VentasQuery orderByCostoTotal($order = Criteria::ASC) Order by the costo_total column
 *
 * @method VentasQuery groupByIdVentas() Group by the id column
 * @method VentasQuery groupByIdUsuarioComprador() Group by the id_usuario_comprador column
 * @method VentasQuery groupByFechaVenta() Group by the fecha_venta column
 * @method VentasQuery groupByCostoTotal() Group by the costo_total column
 *
 * @method VentasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VentasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VentasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VentasQuery leftJoinUsuarioComprador($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioComprador relation
 * @method VentasQuery rightJoinUsuarioComprador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioComprador relation
 * @method VentasQuery innerJoinUsuarioComprador($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioComprador relation
 *
 * @method Ventas findOne(PropelPDO $con = null) Return the first Ventas matching the query
 * @method Ventas findOneOrCreate(PropelPDO $con = null) Return the first Ventas matching the query, or a new Ventas object populated from the query conditions when no match is found
 *
 * @method Ventas findOneByIdUsuarioComprador(int $id_usuario_comprador) Return the first Ventas filtered by the id_usuario_comprador column
 * @method Ventas findOneByFechaVenta(string $fecha_venta) Return the first Ventas filtered by the fecha_venta column
 * @method Ventas findOneByCostoTotal(string $costo_total) Return the first Ventas filtered by the costo_total column
 *
 * @method array findByIdVentas(int $id) Return Ventas objects filtered by the id column
 * @method array findByIdUsuarioComprador(int $id_usuario_comprador) Return Ventas objects filtered by the id_usuario_comprador column
 * @method array findByFechaVenta(string $fecha_venta) Return Ventas objects filtered by the fecha_venta column
 * @method array findByCostoTotal(string $costo_total) Return Ventas objects filtered by the costo_total column
 *
 * @package    propel.generator.demosexto.om
 */
abstract class BaseVentasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVentasQuery object.
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
            $modelName = 'Ventas';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VentasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VentasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VentasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VentasQuery) {
            return $criteria;
        }
        $query = new VentasQuery(null, null, $modelAlias);

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
     * @return   Ventas|Ventas[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VentasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VentasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Ventas A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdVentas($key, $con = null)
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
     * @return                 Ventas A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `id_usuario_comprador`, `fecha_venta`, `costo_total` FROM `ventas` WHERE `id` = :p0';
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
            $obj = new Ventas();
            $obj->hydrate($row);
            VentasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Ventas|Ventas[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Ventas[]|mixed the list of results, formatted by the current formatter
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
     * @return VentasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VentasPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VentasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VentasPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByIdVentas(1234); // WHERE id = 1234
     * $query->filterByIdVentas(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByIdVentas(array('min' => 12)); // WHERE id >= 12
     * $query->filterByIdVentas(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $idVentas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentasQuery The current query, for fluid interface
     */
    public function filterByIdVentas($idVentas = null, $comparison = null)
    {
        if (is_array($idVentas)) {
            $useMinMax = false;
            if (isset($idVentas['min'])) {
                $this->addUsingAlias(VentasPeer::ID, $idVentas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVentas['max'])) {
                $this->addUsingAlias(VentasPeer::ID, $idVentas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentasPeer::ID, $idVentas, $comparison);
    }

    /**
     * Filter the query on the id_usuario_comprador column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUsuarioComprador(1234); // WHERE id_usuario_comprador = 1234
     * $query->filterByIdUsuarioComprador(array(12, 34)); // WHERE id_usuario_comprador IN (12, 34)
     * $query->filterByIdUsuarioComprador(array('min' => 12)); // WHERE id_usuario_comprador >= 12
     * $query->filterByIdUsuarioComprador(array('max' => 12)); // WHERE id_usuario_comprador <= 12
     * </code>
     *
     * @see       filterByUsuarioComprador()
     *
     * @param     mixed $idUsuarioComprador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentasQuery The current query, for fluid interface
     */
    public function filterByIdUsuarioComprador($idUsuarioComprador = null, $comparison = null)
    {
        if (is_array($idUsuarioComprador)) {
            $useMinMax = false;
            if (isset($idUsuarioComprador['min'])) {
                $this->addUsingAlias(VentasPeer::ID_USUARIO_COMPRADOR, $idUsuarioComprador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUsuarioComprador['max'])) {
                $this->addUsingAlias(VentasPeer::ID_USUARIO_COMPRADOR, $idUsuarioComprador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentasPeer::ID_USUARIO_COMPRADOR, $idUsuarioComprador, $comparison);
    }

    /**
     * Filter the query on the fecha_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaVenta('2011-03-14'); // WHERE fecha_venta = '2011-03-14'
     * $query->filterByFechaVenta('now'); // WHERE fecha_venta = '2011-03-14'
     * $query->filterByFechaVenta(array('max' => 'yesterday')); // WHERE fecha_venta < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaVenta The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentasQuery The current query, for fluid interface
     */
    public function filterByFechaVenta($fechaVenta = null, $comparison = null)
    {
        if (is_array($fechaVenta)) {
            $useMinMax = false;
            if (isset($fechaVenta['min'])) {
                $this->addUsingAlias(VentasPeer::FECHA_VENTA, $fechaVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaVenta['max'])) {
                $this->addUsingAlias(VentasPeer::FECHA_VENTA, $fechaVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentasPeer::FECHA_VENTA, $fechaVenta, $comparison);
    }

    /**
     * Filter the query on the costo_total column
     *
     * Example usage:
     * <code>
     * $query->filterByCostoTotal(1234); // WHERE costo_total = 1234
     * $query->filterByCostoTotal(array(12, 34)); // WHERE costo_total IN (12, 34)
     * $query->filterByCostoTotal(array('min' => 12)); // WHERE costo_total >= 12
     * $query->filterByCostoTotal(array('max' => 12)); // WHERE costo_total <= 12
     * </code>
     *
     * @param     mixed $costoTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentasQuery The current query, for fluid interface
     */
    public function filterByCostoTotal($costoTotal = null, $comparison = null)
    {
        if (is_array($costoTotal)) {
            $useMinMax = false;
            if (isset($costoTotal['min'])) {
                $this->addUsingAlias(VentasPeer::COSTO_TOTAL, $costoTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costoTotal['max'])) {
                $this->addUsingAlias(VentasPeer::COSTO_TOTAL, $costoTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentasPeer::COSTO_TOTAL, $costoTotal, $comparison);
    }

    /**
     * Filter the query by a related Usuarios object
     *
     * @param   Usuarios|PropelObjectCollection $usuarios The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VentasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuarioComprador($usuarios, $comparison = null)
    {
        if ($usuarios instanceof Usuarios) {
            return $this
                ->addUsingAlias(VentasPeer::ID_USUARIO_COMPRADOR, $usuarios->getIdUsuarios(), $comparison);
        } elseif ($usuarios instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VentasPeer::ID_USUARIO_COMPRADOR, $usuarios->toKeyValue('PrimaryKey', 'IdUsuarios'), $comparison);
        } else {
            throw new PropelException('filterByUsuarioComprador() only accepts arguments of type Usuarios or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsuarioComprador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VentasQuery The current query, for fluid interface
     */
    public function joinUsuarioComprador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsuarioComprador');

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
            $this->addJoinObject($join, 'UsuarioComprador');
        }

        return $this;
    }

    /**
     * Use the UsuarioComprador relation Usuarios object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsuariosQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioCompradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsuarioComprador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsuarioComprador', 'UsuariosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Ventas $ventas Object to remove from the list of results
     *
     * @return VentasQuery The current query, for fluid interface
     */
    public function prune($ventas = null)
    {
        if ($ventas) {
            $this->addUsingAlias(VentasPeer::ID, $ventas->getIdVentas(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
