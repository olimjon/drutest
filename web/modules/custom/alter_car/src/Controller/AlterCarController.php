<?php


/**
 * @file
 * Contains \Drupal\alter_car\Controller\LinksExampleController.
 */

namespace Drupal\alter_car\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

class AlterCarController extends ControllerBase
{
    public function links()
    {

        $current_user = \Drupal::currentUser();
        $user = \Drupal\user\Entity\User::load($current_user->id());

        $cars = count($user->get('field_user_car')->getValue());


        // Mount the render output.
        // External Link to Drupal.org.
        $url7 = Url::fromUri('https://drupal.org.com');
        $link_options = [
            'attributes' => [
                'target' => '_blank',
                'title' => 'Link to Drupal home page',
            ],
        ];
        $url7->setOptions($link_options);
        $link7 = Link::fromTextAndUrl(t('Go to the Drupal.org site'), $url7);
        $list[] = $link7;

        // Mount the render output.
        $output['links_example'] = [
            '#theme' => 'item_list',
            '#items' => $list,
            '#title' => $this->t('Number of cars:') . '' . $cars,
        ];

        return $output;
    }
}
