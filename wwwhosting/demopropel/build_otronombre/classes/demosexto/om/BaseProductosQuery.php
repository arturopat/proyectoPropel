<?php


/**
 * Base class that represents a query for the 'productos' table.
 *
 *
 *
 * @method ProductosQuery orderByIdProductos($order = Criteria::ASC) Order by the id column
 * @method ProductosQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method ProductosQuery orderByClasificacion($order = Criteria::ASC) Order by the clasificacion column
 * @method ProductosQuery orderByPrecioCompra($order = Criteria::ASC) Order by the precio_compra column
 * @method ProductosQuery orderByPrecioVenta($order = Criteria::ASC) Order by the precio_venta column
 * @method ProductosQuery orderByStock($order = Criteria::ASC) Order by the stock column
 *
 * @method ProductosQuery groupByIdProductos() Group by the id column
 * @method ProductosQuery groupByNombre() Group by the nombre column
 * @method ProductosQuery groupByClasificacion() Group by the clasificacion column
 * @method ProductosQuery groupByPrecioCompra() Group by the precio_compra column
 * @method ProductosQuery groupByPrecioVenta() Group by the precio_venta column
 * @method ProductosQuery groupByStock() Group by the stock column
 *
 * @method ProductosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Productos findOne(PropelPDO $con = null) Return the first Productos matching the query
 * @method Productos findOneOrCreate(PropelPDO $con = null) Return the first Productos matching the query, or a new Productos object populated from the query conditions when no match is found
 *
 * @method Productos findOneByNombre(string $nombre) Return the first Productos filtered by the nombre column
 * @method Productos findOneByClasificacion(int $clasificacion) Return the first Productos filtered by the clasificacion column
 * @method Productos findOneByPrecioCompra(string $precio_compra) Return the first Productos filtered by the precio_compra column
 * @method Productos findOneByPrecioVenta(string $precio_venta) Return the first Productos filtered by the precio_venta column
 * @method Productos findOneByStock(int $stock) Return the first Productos filtered by the stock column
 *
 * @method array findByIdProductos(int $id) Return Productos objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Productos objects filtered by the nombre column
 * @method array findByClasificacion(int $clasificacion) Return Productos objects filtered by the clasificacion column
 * @method array findByPrecioCompra(string $precio_compra) Return Productos objects filtered by the precio_compra column
 * @method array findByPrecioVenta(string $precio_venta) Return Productos objects filtered by the precio_venta column
 * @method array findByStock(int $stock) Return Productos objects filtered by the stock column
 *
 * @package    propel.generator.demosexto.om
 */
abstract class BaseProductosQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductosQuery object.
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
            $modelName = 'Productos';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductosQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductosQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductosQuery) {
            return $criteria;
        }
        $query = new ProductosQuery(null, null, $modelAlias);

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
     * @return   Productos|Productos[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productos A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdProductos($key, $con = null)
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
     * @return                 Productos A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `clasificacion`, `precio_compra`, `precio_venta`, `stock` FROM `productos` WHERE `id` = :p0';
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
            $obj = new Productos();
            $obj->hydrate($row);
            ProductosPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productos|Productos[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productos[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductosPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductosPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProductos(1234); // WHERE id = 1234
     * $query->filterByIdProductos(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByIdProductos(array('min' => 12)); // WHERE id >= 12
     * $query->filterByIdProductos(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $idProductos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductosQuery The current query, for fluid interface
     */
    public function filterByIdProductos($idProductos = null, $comparison = null)
    {
        if (is_array($idProductos)) {
            $useMinMax = false;
            if (isset($idProductos['min'])) {
                $this->addUsingAlias(ProductosPeer::ID, $idProductos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProductos['max'])) {
                $this->addUsingAlias(ProductosPeer::ID, $idProductos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductosPeer::ID, $idProductos, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductosQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductosPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the clasificacion column
     *
     * @param     mixed $clasificacion The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductosQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByClasificacion($clasificacion = null, $comparison = null)
    {
        if (is_scalar($clasificacion)) {
            $clasificacion = ProductosPeer::getSqlValueForEnum(ProductosPeer::CLASIFICACION, $clasificacion);
        } elseif (is_array($clasificacion)) {
            $convertedValues = array();
            foreach ($clasificacion as $value) {
                $convertedValues[] = ProductosPeer::getSqlValueForEnum(ProductosPeer::CLASIFICACION, $value);
            }
            $clasificacion = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductosPeer::CLASIFICACION, $clasificacion, $comparison);
    }

    /**
     * Filter the query on the precio_compra column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecioCompra(1234); // WHERE precio_compra = 1234
     * $query->filterByPrecioCompra(array(12, 34)); // WHERE precio_compra IN (12, 34)
     * $query->filterByPrecioCompra(array('min' => 12)); // WHERE precio_compra >= 12
     * $query->filterByPrecioCompra(array('max' => 12)); // WHERE precio_compra <= 12
     * </code>
     *
     * @param     mixed $precioCompra The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductosQuery The current query, for fluid interface
     */
    public function filterByPrecioCompra($precioCompra = null, $comparison = null)
    {
        if (is_array($precioCompra)) {
            $useMinMax = false;
            if (isset($precioCompra['min'])) {
                $this->addUsingAlias(ProductosPeer::PRECIO_COMPRA, $precioCompra['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precioCompra['max'])) {
                $this->addUsingAlias(ProductosPeer::PRECIO_COMPRA, $precioCompra['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductosPeer::PRECIO_COMPRA, $precioCompra, $comparison);
    }

    /**
     * Filter the query on the precio_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecioVenta(1234); // WHERE precio_venta = 1234
     * $query->filterByPrecioVenta(array(12, 34)); // WHERE precio_venta IN (12, 34)
     * $query->filterByPrecioVenta(array('min' => 12)); // WHERE precio_venta >= 12
     * $query->filterByPrecioVenta(array('max' => 12)); // WHERE precio_venta <= 12
     * </code>
     *
     * @param     mixed $precioVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductosQuery The current query, for fluid interface
     */
    public function filterByPrecioVenta($precioVenta = null, $comparison = null)
    {
        if (is_array($precioVenta)) {
            $useMinMax = false;
            if (isset($precioVenta['min'])) {
                $this->addUsingAlias(ProductosPeer::PRECIO_VENTA, $precioVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precioVenta['max'])) {
                $this->addUsingAlias(ProductosPeer::PRECIO_VENTA, $precioVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductosPeer::PRECIO_VENTA, $precioVenta, $comparison);
    }

    /**
     * Filter the query on the stock column
     *
     * Example usage:
     * <code>
     * $query->filterByStock(1234); // WHERE stock = 1234
     * $query->filterByStock(array(12, 34)); // WHERE stock IN (12, 34)
     * $query->filterByStock(array('min' => 12)); // WHERE stock >= 12
     * $query->filterByStock(array('max' => 12)); // WHERE stock <= 12
     * </code>
     *
     * @param     mixed $stock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductosQuery The current query, for fluid interface
     */
    public function filterByStock($stock = null, $comparison = null)
    {
        if (is_array($stock)) {
            $useMinMax = false;
            if (isset($stock['min'])) {
                $this->addUsingAlias(ProductosPeer::STOCK, $stock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stock['max'])) {
                $this->addUsingAlias(ProductosPeer::STOCK, $stock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductosPeer::STOCK, $stock, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Productos $productos Object to remove from the list of results
     *
     * @return ProductosQuery The current query, for fluid interface
     */
    public function prune($productos = null)
    {
        if ($productos) {
            $this->addUsingAlias(ProductosPeer::ID, $productos->getIdProductos(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
