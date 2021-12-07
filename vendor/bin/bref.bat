@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../bref/bref/bref
php "%BIN_TARGET%" %*
