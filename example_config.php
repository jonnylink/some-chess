<?php/********************************************************************************** "Some Chess" some rights reserved 2007** Some Chess written by Jon Link** ** This program is free software; you can redistribute it and/or** modify it under the terms of the GNU General Public License ** as published by the Free Software Foundation; either version 2.1 ** of the License, or (at your option) any later version.** ** This program is distributed in the hope that it will be useful,** but WITHOUT ANY WARRANTY; without even the implied warranty of** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU** General Public License for more details.** ** You should have received a copy of the GNU General Public License ** along with this program; if not, write to the Free Software Foundation, ** Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA**** The images found in the folder alt-pieces [p,r,n,q,k][d,l][d,l].png are GPL, ** from Wikimedia Commons, see gpl.txt**** All other images are �Jon Link and may be used freely but only with permission**** a small portion of the code to display the chess board ** was taken from phpChessBoard written by Andreas Stieger**********************************************************************************///-- Main Settings (SOME CHANGES REQUIRED)$host		= 'localhost'; 		// host name of database (usually it's localhost)$dbUser		= '';				// username for DB$dbPass		= '';				// password for DB$database	= 'somechess';		// DB name (suggested name is somechess, but you can change it of course)$dbPre		= '';				// add a prefix to Some Chess table names (optional)$lang		= 'en';				// language Some Chess uses$firstrun	= true;				// DO NOT EDIT THIS LINE@mysql_connect($host,$dbUser,$dbPass);@mysql_select_db($database) or die('ERROR: can\'t connect to database');?>