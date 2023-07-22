<?php return array (
  '7b193500-ac0b-481f-a79c-2a362646364d' => 
  array (
    'uuid' => '7b193500-ac0b-481f-a79c-2a362646364d',
    'handle' => 'BlockBuilder',
    'type' => 'mixin',
    'name' => 'Block Builder',
    'fields' => 
    array (
      'blocks' => 
      array (
        'label' => 'Blocks',
        'type' => 'repeater',
        'displayMode' => 'builder',
        'span' => 'adaptive',
        'tab' => 'Blocks',
        'groups' => 
        array (
          'home' => 
          array (
            'name' => 'Homepage',
            'description' => 'Home page',
            'icon' => 'octo-icon-picture',
            'fields' => 
            array (
              '_mixin' => 
              array (
                'type' => 'mixin',
                'source' => 'Blocks\\Home',
              ),
            ),
          ),
          'about' => 
          array (
            'name' => 'About',
            'description' => 'About page',
            'icon' => 'octo-icon-text-h1',
            'fields' => 
            array (
              '_mixin' => 
              array (
                'type' => 'mixin',
                'source' => 'Blocks\\About',
              ),
            ),
          ),
          'testimonies' => 
          array (
            'name' => 'Testimonies',
            'description' => 'Portfolio page',
            'icon' => 'octo-icon-diamond',
            'fields' => 
            array (
              '_mixin' => 
              array (
                'type' => 'mixin',
                'source' => 'Blocks\\Testimonies',
              ),
            ),
          ),
        ),
      ),
    ),
    'handleSlug' => 'block_builder',
  ),
  '015fde4b-23d8-4ba3-8e78-9c6ebfb5fcf7' => 
  array (
    'uuid' => '015fde4b-23d8-4ba3-8e78-9c6ebfb5fcf7',
    'name' => 'Paragraph Block',
    'type' => 'mixin',
    'handle' => 'Blocks\\About',
    'fields' => 
    array (
      'image' => 
      array (
        'label' => 'Image',
        'type' => 'mediafinder',
        'mode' => 'image',
        'maxItems' => 1,
        'span' => 'full',
      ),
      'heading' => 
      array (
        'label' => 'Heading',
        'type' => 'text',
        'span' => 'full',
      ),
      'paragraph' => 
      array (
        'label' => 'Paragraph',
        'type' => 'richeditor',
        'span' => 'full',
      ),
      'button_text' => 
      array (
        'label' => 'Button Text',
        'type' => 'text',
        'span' => 'auto',
      ),
      'button_url' => 
      array (
        'label' => 'Button URL',
        'type' => 'text',
        'span' => 'auto',
      ),
    ),
    'handleSlug' => 'blocks_about',
  ),
  '21aad99b-d3c6-4f5e-b271-15471c81e11b' => 
  array (
    'uuid' => '21aad99b-d3c6-4f5e-b271-15471c81e11b',
    'name' => 'Homepage',
    'type' => 'mixin',
    'handle' => 'Blocks\\Home',
    'fields' => 
    array (
      'image' => 
      array (
        'label' => 'Image',
        'type' => 'mediafinder',
        'mode' => 'image',
        'maxItems' => 1,
        'span' => 'auto',
      ),
      'heading1' => 
      array (
        'label' => 'Top Text',
        'type' => 'text',
        'span' => 'auto',
      ),
      'heading2' => 
      array (
        'label' => 'Bottom Text',
        'type' => 'text',
        'span' => 'auto',
      ),
    ),
    'handleSlug' => 'blocks_home',
  ),
  '8c4041cf-f16d-46f8-86be-9372a266ae6d' => 
  array (
    'uuid' => '8c4041cf-f16d-46f8-86be-9372a266ae6d',
    'name' => 'Team Leaders',
    'type' => 'mixin',
    'handle' => 'Blocks\\Testimonies',
    'fields' => 
    array (
      'heading' => 
      array (
        'label' => 'Hwading',
        'span' => 'full',
      ),
      'testimonies' => 
      array (
        'label' => 'Members',
        'type' => 'repeater',
        'itemsExpanded' => false,
        'form' => 
        array (
          'fields' => 
          array (
            'title' => 
            array (
              'label' => 'Title',
              'span' => 'full',
            ),
            'name' => 
            array (
              'label' => 'Name',
              'type' => 'text',
              'size' => 'tiny',
            ),
            'testimony' => 
            array (
              'label' => 'Testimony',
              'type' => 'textarea',
              'size' => 'tiny',
            ),
            'avatar' => 
            array (
              'label' => 'Image',
              'type' => 'mediafinder',
              'mode' => 'image',
              'maxItems' => 1,
            ),
          ),
        ),
      ),
    ),
    'handleSlug' => 'blocks_testimonies',
  ),
  '245be2f7-819f-46ec-b0fa-157075b21f51' => 
  array (
    'uuid' => '245be2f7-819f-46ec-b0fa-157075b21f51',
    'name' => 'Testimonies',
    'type' => 'mixin',
    'handle' => 'Testimonies',
    'navigation' => 
    array (
      'parent' => 'Testimonies',
      'icon' => 'icon-magic',
      'order' => 10,
    ),
    'fields' => 
    array (
      'heading' => 
      array (
        'label' => 'Hwading',
        'span' => 'full',
      ),
      'testimonies' => 
      array (
        'label' => 'Members',
        'type' => 'repeater',
        'itemsExpanded' => false,
        'form' => 
        array (
          'fields' => 
          array (
            'title' => 
            array (
              'label' => 'Title',
              'span' => 'full',
            ),
            'name' => 
            array (
              'label' => 'Name',
              'type' => 'text',
              'size' => 'tiny',
            ),
            'testimony' => 
            array (
              'label' => 'Testimony',
              'type' => 'textarea',
              'size' => 'tiny',
            ),
            'avatar' => 
            array (
              'label' => 'Image',
              'type' => 'mediafinder',
              'mode' => 'image',
              'maxItems' => 1,
            ),
          ),
        ),
      ),
    ),
    'handleSlug' => 'testimonies',
  ),
);