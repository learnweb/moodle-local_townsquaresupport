# Townsquare Support #

A moodle local plugin that manages the subplugins for the [townsquare](https://github.com/learnweb/moodle-block_townsquare)
block.

## How to install a subplugin ##

To install a townsquare subplugin, clone the repository of the subplugin into the following directory:

`{your/moodle/dirroot}/local/townsquaresupport/townsquareexpansion/{pluginname}`

Afterwards, log in to your Moodle site as an admin and go to _Site administration >
Notifications_ to complete the installation.
Alternatively, you can run `$ php admin/cli/upgrade.php` to complete the installation from the command line.

## How to implement a subplugin ##

To implement a subplugin for townsquare, the subplugins needs to meet the following requirements:

1. The plugin type must be`townsquareexpansion_{pluginname}`.
2. The plugins must have at least the following files:

   - `version.php`
   - `lang/en/{pluginname}.php `
   - `classes/{pluginname}.php `

   The most important file is the `{pluginname}` class. This class needs to implement the `townsquaresupportinterface` located in
   `{your/moodle/dirroot}/local/townsquaresupport/classes/townsquaresupportinterface.php.`. By implementing the interface, the
   subplugin can make notifications available for the townsquare block.

> For more information read the [developer documentation](https://github.com/learnweb/moodle-local_townsquaresupport/wiki/Documentation-for-developers).
> Examples of existing subplugins can be found [here](https://github.com/learnweb/moodle-local_townsquaresupport/wiki/List-of-approved-Subplugins).

---

## Installing via uploaded ZIP file ##

1. Log in to your Moodle site as an admin and go to _Site administration >
   Plugins > Install plugins_.
2. Upload the ZIP file with the plugin code. You should only be prompted to add
   extra details if your plugin type is not automatically detected.
3. Check the plugin validation report and finish the installation.

## Installing manually ##

The plugin can be also installed by putting the contents of this directory to

    {your/moodle/dirroot}/local/townsquaresupport

Afterwards, log in to your Moodle site as an admin and go to _Site administration >
Notifications_ to complete the installation.

Alternatively, you can run

    $ php admin/cli/upgrade.php

to complete the installation from the command line.

## License ##

2024 Tamaro Walter

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.
