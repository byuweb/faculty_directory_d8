<?php
/**
* @file
* Contains \Drupal\byu_faculty_directory\Controller\DirectoryController.
*/
namespace Drupal\byu_faculty_directory\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;


class DirectoryController extends ControllerBase {
   public function listingRender() {
     \Drupal\Core\Database\Database::setActiveConnection('external');
     /*$db = \Drupal::database();
     $entries = $db->select('faculty_directory', '*')->execute();*/
     $query = db_query("SELECT * FROM faculty_directory ORDER BY last_name, first_name");
     $entries = $query->fetchAll();
     \Drupal\Core\Database\Database::setActiveConnection('default');
     return [
       '#theme' => 'byu_faculty_directory',
       '#entries' => $entries,
       '#template' => 0,
       '#attached' => [
         'library' => [
           'byu_faculty_directory/faculty-directory-component-css',
           'byu_faculty_directory/byu-faculty-directory-drupal-css',
           'byu_faculty_directory/faculty-directory-component-js'
         ]
       ]
     ];
   }

   public function profileRender($id) {
     \Drupal\Core\Database\Database::setActiveConnection('external');
     $query = db_query("SELECT * FROM faculty_directory WHERE uid=$id ORDER BY last_name, first_name");
     $entry = $query->fetch();
     \Drupal\Core\Database\Database::setActiveConnection('default');
     return [
       '#theme' => 'byu_faculty_directory',
       '#entries' => $entry,
       '#template' => 1,
       '#attached' => [
         'library' => [
           'byu_faculty_directory/faculty-directory-component-css',
           'byu_faculty_directory/byu-faculty-directory-drupal-css',
           'byu_faculty_directory/faculty-directory-component-js'
         ]
       ]
     ];
   }
}
