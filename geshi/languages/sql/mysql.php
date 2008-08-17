<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/sql/mysql.php
 *   Author: Nigel McNie
 *   E-mail: nigel@geshi.org
 * </pre>
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 * This program is part of GeSHi.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package    geshi
 * @subpackage lang
 * @author     Milian Wolff
 * @copyright  (C) 2006 Nigel McNie
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @version    $Id$
 */

//
// SQL:
//  Statements separated by ;
//  Statements contain tokens
//  Tokens can be:
//    - key word
//    - identifier (name)
//    - quoted identifier
//    - literal (constant)
//    - special character symbol
//
//  Keywords and identifiers have the same lexical structure!
//
// TODO:
//   Merge all keywords back into one array. The code parser will instead
//   be written to be much smarter about how it tells between an identifier
//   and a keyword.
//

require_once GESHI_LANGUAGES_ROOT . 'sql' . GESHI_DIR_SEP . 'common.php';

function geshi_sql_mysql (&$context)
{
    geshi_sql_common($context);

    $context->addKeywordGroup(array(
        /* Mix */
        'ALTER', 'ALTER DATABASE', 'ALTER FUNCTION', 'ALTER PROCEDURE',
        'ALTER ROUTINE', 'ALTER TABLE', 'ANALYZE', 'BDB', 'BEGIN',
        'BERKELEYDB', 'BTREE', 'BY', 'CALL', 'CASCADE', 'CHECK',
        'COLUMN', 'COLUMNS', 'COMMIT', 'CONSTRAINT', 'CREATE',
        'CREATE DATABASE', 'CREATE FUNCTION', 'CREATE INDEX',
        'CREATE PROCEDURE', 'CREATE ROUTINE', 'CREATE TABLE',
        'CROSS', 'DATABASES', 'DECLARE', 'DELAYED', 'DELETE',
        'DESCRIBE', 'DISTINCT', 'DISTINCTROW', 'DO', 'DROP',
        'DROP DATABASE', 'DROP FUNCTION', 'DROP INDEX',
        'DROP PROCEDURE', 'DROP TABLE', 'ENCLOSED', 'END', 'ERRORS',
        'ESCAPED', 'EXISTS', 'EXPLAIN', 'FALSE', 'FIELDS', 'FORCE',
        'FOREIGN', 'FROM', 'FULLTEXT', 'GEOMETRY', 'GRANT', 'GROUP',
        'HANDLER', 'HASH', 'HAVING', 'HELP', 'HIGH_PRIORITY',
        'IGNORE', 'INNER', 'INNODB', 'INSERT', 'INTERVAL', 'INTO',
        'JOIN', 'KEYS', 'KILL', 'LINES', 'LOAD DATA INFILE',
        'LOCK TABLES', 'LOW_PRIORITY', 'MASTER_SERVER_ID', 'MATCH',
        'MIDDLEINT', 'MRG_MYISAM', 'NATURAL', 'OPTIMIZE', 'OPTION',
        'OPTIONALLY', 'ORDER', 'OUTER', 'OUTFILE', 'PRIMARY KEY',
        'PRIVILEGES', 'PURGE', 'READ', 'REFERENCES', 'RENAME TABLE',
        'REPLACE', 'REQUIRE', 'RESTRICT', 'RETURNS', 'REVOKE',
        'RLIKE', 'ROLLBACK', 'ROLLBACK TO SAVEPOINT', 'RTREE',
        'SAVEPOINT', 'SELECT', 'SET', 'SET TRANACTIONS', 'SHOW',
        'SHOW CREATE FUNCTION', 'SHOW CREATE PROCEDURE',
        'SHOW FUNCTION STATUS', 'SHOW PROCEDURE STATUS', 'SOME',
        'SONAME', 'SPATIAL', 'SQL_BIG_RESULT', 'SQL_CALC_FOUND_ROWS',
        'SQL_SMALL_RESULT', 'SSL', 'STARTING', 'START TRANSACTION',
        'STRAIGHT_JOIN', 'STRIPED', 'TERMINATED', 'TRUE', 'TRUNCATE',
        'TYPES', 'UNION', 'UNLOCK_TABLES', 'UPDATE', 'USAGE', 'USE',
        'USER_RESOURCES', 'USING', 'VALUES', 'VARCHARACTER',
        'WARNINGS', 'WHERE', 'WRITE',

        /* Control Flow Functions */
        'CASE', 'WHEN', 'THEN', 'ELSE', 'END',

        /* String Functions */
        'BIN', 'BIT_LENGTH', 'CHARACTER_LENGTH', 'CHAR_LENGTH', 'COMPRESS',
        'CONCAT', 'CONCAT_WS', 'CONV', 'ELT', 'EXPORT_SET', 'FIELD',
        'FIND_IN_SET', 'FORMAT', 'HEX', 'INSERT', 'INSTR', 'LCASE',
        'LEFT', 'LENGTH', 'LOAD_FILE', 'LOCATE', 'LOWER', 'LPAD',
        'LTRIM', 'MAKE_SET', 'MD5', 'MID', 'OCT', 'OCTET_LENGTH',
        'ORD', 'POSITION', 'QUOTE', 'REPEAT', 'REPLACE', 'REVERSE',
        'RIGHT', 'RPAD', 'RTRIM', 'SHA1', 'SOUNDEX', 'SPACE',
        'SUBSTRING', 'SUBSTRING_INDEX', 'TRIM', 'UCASE',
        'UNCOMPRESS', 'UNCOMPRESSD_LENGTH', 'UNHEX', 'UPPER',

        /* Numeric Functions */
        'ABS', 'ACOS', 'ASIN', 'ATAN', 'ATAN2', 'CEIL', 'CEILING', 'COS',
        'COT', 'CRC32', 'DEGREES', 'EXP', 'FLOOR', 'LN', 'LOG',
        'LOG2', 'LOG10', 'MOD', 'PI', 'POW', 'POWER', 'RADIANS',
        'RAND', 'ROUND', 'SIGN', 'SIN', 'SQRT', 'TAN', 'TRUNCATE',

        /* Date and Time Functions */
        'ADDDATE', 'ADDTIME', 'CONVERT_TZ', 'CURDATE', 'CURRENT_DATE',
        'CURRENT_TIME', 'CURRENT_TIMESTAMP', 'CURTIME', 'DATEDIFF',
        'DATE_ADD', 'DATE_FORMAT', 'DATE_SUB', 'DAY', 'DAYNAME',
        'DAYOFMONTH', 'DAYOFWEEK', 'DAYOFYEAR', 'EXTRACT',
        'FROM_DAYS', 'FROM_UNIXTIME', 'GET_FORMAT', 'LAST_DAY',
        'LOCALTIME', 'LOCALTIMESTAMP', 'MAKEDATE', 'MAKETIME',
        'MICROSECOND', 'MONTHNAME', 'NOW', 'PERIOD_ADD',
        'PERIOD_DIFF', 'QUARTER', 'SECOND', 'SEC_TO_TIME',
        'STR_TO_DATE', 'SUBDATE', 'SUBTIME', 'SYSDATE', 'TIME',
        'TIMEDIFF', 'TIMESTAMP', 'TIMESTAMPADD', 'TIMESTAMPDIFF',
        'TIME_FORMAT', 'TIME_TO_SEC', 'TO_DAYS', 'UNIX_TIMESTAMP',
        'UTC_DATE', 'UTC_TIME', 'UTC_TIMESTAMP', 'WEEKDAY',
        'WEEKOFYEAR', 'YEARWEEK',
    ), 'keyword/reserved');


    $context->addKeywordGroup(array(
        'ASCII', 'AUTO_INCREMENT', 'BOTH', 'CHARACTER SET', 'CHARSET',
        'DEFAULT', 'LEADING', 'NATIONAL', 'NOT', 'NOT NULL', 'NULL',
        'TRAILING', 'UNICODE', 'UNIQUE', 'UNSIGNED', 'ZEROFILL'
    ), 'keyword/flag'); //@todo: better name

    $context->addKeywordGroup(array(
        'DAY', 'DAY_HOUR', 'DAY_MICROSECOND', 'DAY_MINUTE', 'DAY_SECOND',
        'HOUR', 'HOUR_MICROSECOND', 'HOUR_MINUTE', 'HOUR_SECOND',
        'MICROSECOND', 'MINUTE', 'MINUTE_MICROSECOND',
        'MINUTE_SECOND', 'MONTH', 'QUARTER', 'SECOND',
        'SECOND_MICROSECOND', 'WEEK', 'YEAR', 'YEAR_MONTH'
    ), 'keyword/datetime');

    $context->addKeywordGroup(array(
        'OR', 'XOR', 'AND', 'NOT', 'BETWEEN', 'IS', 'LIKE', 'REGEXP', 'IN', 'DIV',
        'MOD', 'BINARY', 'COLLATE', 'LIMIT', 'OFFSET'
    ), 'keyword/other'); //@todo: better name

    // This group contains datatypes, which are really keywords but we split
    // them out because people like them highlighted differently. For some
    // reason the postgres documentation I got these lists from did not list
    // "SERIAL" as a keyword...
    $context->addKeywordGroup(array(
      'BIGINT', 'BINARY', 'BIT', 'BLOB', 'CHAR', 'CHARACTER VARYING', 'DATE',
      'DATETIME', 'DEC', 'DECIMAL', 'DOUBLE', 'DOUBLE PRECISION',
      'ENUM', 'FIXED', 'FLOAT', 'INT', 'INTEGER', 'LONGBLOB',
      'LONGTEXT', 'MEDIUMBLOB', 'MEDIUMINT', 'MEDIUMTEXT', 'NUMERIC',
      'REAL', 'SERIAL', 'SERIAL DEFAULT VALUE', 'SET', 'SMALLINT',
      'SMALLINT', 'TEXT', 'TIME', 'TIMESTAMP', 'TINYBLOB', 'TINYINT',
      'TINYTEXT', 'VARBINARY', 'VARCHAR', 'YEAR'
    ), 'type');

}

function geshi_sql_mysql_single_comment (&$context)
{
    $context->addDelimiters('--', "\n");
    $context->addDelimiters('#', "\n");
}
