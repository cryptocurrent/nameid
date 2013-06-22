<?php
/*
    NameID, a namecoin based OpenID identity provider.
    Copyright (C) 2013 by Daniel Kraft <d@domob.eu>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/* Manage the user login session.  */

require_once ("config.inc.php");

/**
 * This class manages all session related stuff.  Basically that is
 * to keep track of whether or not a user is logged in.
 */
class Session
{

  /**
   * Construct, which starts the session.
   */
  public function __construct ()
  {
    global $sessionName;

    session_name ($sessionName);
    session_start ();
  }

  /**
   * Close at the end.
   */
  public function close ()
  {
    // Nothing to do (at least for now).
  }

  /**
   * See whether a user is logged in.
   * @return The logged in name (without namespace prefix) or NULL if no login.
   */
  public function getUser ()
  {
    if (!isset ($_SESSION["loggedIn"]))
      return NULL;
    $val = $_SESSION["loggedIn"];
    if (!is_string ($val))
      return NULL;

    return $val;
  }

  /**
   * Set the logged in user to the given name.  If NULL is passed, log the
   * user out instead.
   * @param name Name to log in.
   */
  public function setUser ($name)
  {
    if ($name)
      $_SESSION["loggedIn"] = $name;
    else
      unset ($_SESSION["loggedIn"]);
  }

}

?>