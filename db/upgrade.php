<?php

function xmldb_local_omegasync_upgrade($oldversion) {
	global $CFG, $DB;

	$dbman = $DB->get_manager();

if ($oldversion < 2015052201) {

	// Define table local_omegasync to be created.
	$table = new xmldb_table('local_omegasync');

	// Adding fields to table local_omegasync.
	$table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
	$table->add_field('unidad_academica', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
	$table->add_field('periodo_academico', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
	$table->add_field('facultad', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
	$table->add_field('estado', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

	// Adding keys to table local_omegasync.
	$table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

	// Conditionally launch create table for local_omegasync.
	if (!$dbman->table_exists($table)) {
		$dbman->create_table($table);
	}

	// Omegasync savepoint reached.
	upgrade_plugin_savepoint(true, 2015052201, 'local', 'omegasync');
}

if ($oldversion < 2015052202) {

	// Define field fecha_creacion to be added to local_omegasync.
	$table = new xmldb_table('local_omegasync');
	$field = new xmldb_field('fecha_creacion', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'estado');

	// Conditionally launch add field fecha_creacion.
	if (!$dbman->field_exists($table, $field)) {
		$dbman->add_field($table, $field);
	}

	// Omegasync savepoint reached.
	upgrade_plugin_savepoint(true, 2015052202, 'local', 'omegasync');
}

if ($oldversion < 2015052203) {

	// Define table webc_omega to be created.
	$table = new xmldb_table('webc_omega');

	// Adding fields to table webc_omega.
	$table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
	$table->add_field('omegasync_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

	// Adding keys to table webc_omega.
	$table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

	// Conditionally launch create table for webc_omega.
	if (!$dbman->table_exists($table)) {
		$dbman->create_table($table);
	}

	// Omegasync savepoint reached.
	upgrade_plugin_savepoint(true, 2015052203, 'local', 'omegasync');
}
}