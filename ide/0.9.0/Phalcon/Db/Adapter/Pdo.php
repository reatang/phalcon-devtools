<?php 

namespace Phalcon\Db\Adapter {

	/**
	 * Phalcon\Db\Adapter\Pdo
	 *
	 * Phalcon\Db\Adapter\Pdo is the Phalcon\Db that internally uses PDO to connect to a database
	 *
	 * <code>
	 * $connection = new Phalcon\Db\Adapter\Pdo\Mysql(array(
	 *  'host' => '192.168.0.11',
	 *  'username' => 'sigma',
	 *  'password' => 'secret',
	 *  'dbname' => 'blog',
	 *  'port' => '3306',
	 * ));
	 * </code>
	 */
	
	class Pdo extends \Phalcon\Db\Adapter {

		protected $_pdo;

		protected $_affectedRows;

		protected $_transactionLevel;

		/**
		 * Constructor for \Phalcon\Db\Adapter\Pdo
		 *
		 * @param array $descriptor
		 */
		public function __construct($descriptor){ }


		/**
		 * This method is automatically called in \Phalcon\Db\Adapter\Pdo constructor.
		 * Call it when you need to restore a database connection
		 *
		 *<code>
		 * //Make a connection
		 * $connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
		 *  'host' => '192.168.0.11',
		 *  'username' => 'sigma',
		 *  'password' => 'secret',
		 *  'dbname' => 'blog',
		 * ));
		 *
		 * //Reconnect
		 * $connection->connect();
		 * </code>
		 *
		 * @param 	array $descriptor
		 * @return 	boolean
		 */
		public function connect($descriptor=null){ }


		/**
		 * Executes a prepared statement binding. This function uses integer indexes starting from zero
		 *
		 *<code>
		 * $statement = $db->prepare('SELECT * FROM robots WHERE name = :name');
		 * $result = $connection->executePrepared($statement, array('name' => 'Voltron'));
		 *</code>
		 *
		 * @param \PDOStatement $statement
		 * @param array $placeholders
		 * @param array $dataTypes
		 * @return \PDOStatement
		 */
		public function executePrepared($statement, $placeholders, $dataTypes){ }


		/**
		 * Sends SQL statements to the database server returning the success state.
		 * Use this method only when the SQL statement sent to the server is returning rows
		 *
		 *<code>
		 *	//Querying data
		 *	$resultset = $connection->query("SELECT * FROM robots WHERE type='mechanical'");
		 *	$resultset = $connection->query("SELECT * FROM robots WHERE type=?", array("mechanical"));
		 *</code>
		 *
		 * @param  string $sqlStatement
		 * @param  array $bindParams
		 * @param  array $bindTypes
		 * @return \Phalcon\Db\ResultInterface
		 */
		public function query($sqlStatement, $bindParams=null, $bindTypes=null){ }


		/**
		 * Sends SQL statements to the database server returning the success state.
		 * Use this method only when the SQL statement sent to the server don't return any row
		 *
		 *<code>
		 *	//Inserting data
		 *	$success = $connection->execute("INSERT INTO robots VALUES (1, 'Astro Boy')");
		 *	$success = $connection->execute("INSERT INTO robots VALUES (?, ?)", array(1, 'Astro Boy'));
		 *</code>
		 *
		 * @param  string $sqlStatement
		 * @param  array $bindParams
		 * @param  array $bindTypes
		 * @return boolean
		 */
		public function execute($sqlStatement, $bindParams=null, $bindTypes=null){ }


		/**
		 * Returns the number of affected rows by the last INSERT/UPDATE/DELETE reported by the database system
		 *
		 *<code>
		 *	$connection->query("DELETE FROM robots");
		 *	echo $connection->affectedRows(), ' were deleted';
		 *</code>
		 *
		 * @return int
		 */
		public function affectedRows(){ }


		/**
		 * Closes active connection returning success. \Phalcon automatically closes and destroys active connections when the request ends
		 *
		 * @return boolean
		 */
		public function close(){ }


		/**
		 * Escapes a column/table/schema name
		 *
		 *<code>
		 *	$escapedTable = $connection->escapeIdentifier('robots');
		 *</code>
		 *
		 * @param string $identifier
		 * @return string
		 */
		public function escapeIdentifier($identifier){ }


		/**
		 * Escapes a value to avoid SQL injections
		 *
		 *<code>
		 *	$escapedStr = $connection->escapeString('some dangerous value');
		 *</code>
		 *
		 * @param string $str
		 * @return string
		 */
		public function escapeString($str){ }


		/**
		 * Manually bind params to a SQL statement. This method requires an active connection to a database system
		 *
		 *<code>
		 *	$sql = $connection->bindParams('SELECT * FROM robots WHERE name = ?0', array('Bender'));
		 *  echo $sql; // SELECT * FROM robots WHERE name = 'Bender'
		 *</code>
		 *
		 * @param string $sqlStatement
		 * @param array $params
		 * @return string
		 */
		public function bindParams($sqlStatement, $params){ }


		/**
		 * Converts bound params such as :name: or ?1 into PDO bind params ?
		 *
		 *<code>
		 * print_r($connection->convertBoundParams('SELECT * FROM robots WHERE name = :name:', array('Bender')));
		 *</code>
		 *
		 * @param string $sql
		 * @param array $params
		 * @return array
		 */
		public function convertBoundParams($sql, $params){ }


		/**
		 * Returns insert id for the auto_increment/serial column inserted in the last SQL statement
		 *
		 *<code>
		 * //Inserting a new robot
		 * $success = $connection->insert(
		 *     "robots",
		 *     array("Astro Boy", 1952),
		 *     array("name", "year")
		 * );
		 *
		 * //Getting the generated id
		 * $id = $connection->lastInsertId();
		 *</code>
		 *
		 * @param string $sequenceName
		 * @return int
		 */
		public function lastInsertId($sequenceName=null){ }


		/**
		 * Starts a transaction in the connection
		 *
		 * @return boolean
		 */
		public function begin(){ }


		/**
		 * Rollbacks the active transaction in the connection
		 *
		 * @return boolean
		 */
		public function rollback(){ }


		/**
		 * Commits the active transaction in the connection
		 *
		 * @return boolean
		 */
		public function commit(){ }


		/**
		 * Checks whether connection is under database transaction
		 *
		 *<code>
		 * $connection->begin();
		 * var_dump($connection->isUnderTransaction()); //true
		 *</code>
		 *
		 * @return boolean
		 */
		public function isUnderTransaction(){ }


		/**
		 * Return internal PDO handler
		 *
		 * @return \PDO
		 */
		public function getInternalHandler(){ }


		/**
		 * Lists table indexes
		 *
		 *<code>
		 * print_r($connection->describeIndexes('robots_parts'));
		 *</code>
		 *
		 * @param string $table
		 * @param string $schema
		 * @return \Phalcon\Db\Index[]
		 */
		public function describeIndexes($table, $schema=null){ }


		/**
		 * Lists table references
		 *
		 *<code>
		 * print_r($connection->describeReferences('robots_parts'));
		 *</code>
		 *
		 * @param string $table
		 * @param string $schema
		 * @return \Phalcon\Db\Reference[]
		 */
		public function describeReferences($table, $schema=null){ }


		/**
		 * Gets creation options from a table
		 *
		 *<code>
		 * print_r($connection->tableOptions('robots'));
		 *</code>
		 *
		 * @param string $tableName
		 * @param string $schemaName
		 * @return array
		 */
		public function tableOptions($tableName, $schemaName=null){ }


		/**
		 * Return the default identity value to insert in an identity column
		 *
		 *<code>
		 * //Inserting a new robot with a valid default value for the column 'id'
		 * $success = $connection->insert(
		 *     "robots",
		 *     array($connection->getDefaultIdValue(), "Astro Boy", 1952),
		 *     array("id", "name", "year")
		 * );
		 *</code>
		 *
		 * @return \Phalcon\Db\RawValue
		 */
		public function getDefaultIdValue(){ }


		/**
		 * Check whether the database system requires a sequence to produce auto-numeric values
		 *
		 * @return boolean
		 */
		public function supportSequences(){ }

	}
}
