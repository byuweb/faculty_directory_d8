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
     /*\Drupal\Core\Database\Database::setActiveConnection('external');
     $query = db_query("SELECT * FROM faculty_directory ORDER BY last_name, first_name");
     $entries = $query->fetchAll();
     \Drupal\Core\Database\Database::setActiveConnection('default');*/
     $node_ids = \Drupal::entityQuery('node')->condition('type','byu_faculty_member')->execute();
     $nodes = \Drupal\node\Entity\Node::loadMultiple($node_ids);
     return [
       '#theme' => 'byu_faculty_directory',
       '#entries' => $nodes, #$entries,
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
     /*\Drupal\Core\Database\Database::setActiveConnection('external');
     $query = db_query("SELECT * FROM faculty_directory WHERE uid=$id ORDER BY last_name, first_name");
     $entry = $query->fetch();
     \Drupal\Core\Database\Database::setActiveConnection('default');*/
     $node_ids = \Drupal::entityQuery('node')->condition('type','byu_faculty_member')->execute();
     $nodes = \Drupal\node\Entity\Node::loadMultiple($node_ids);

    $return_node = NULL;
     foreach ($nodes as $node) {
       if ($node->get('field_uid')->getValue() == $id){
         $return_node = $node;
         break;
       }
     }
     return [
       '#theme' => 'byu_faculty_directory',
       '#entries' => $return_node, #$entry,
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
