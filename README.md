# Fusion

This project aims to provide a standard programming interface with the popular WordPress advanced custom fields plugin. Field groups are created and managed programmatically without the use of the graphical front end or acf-json files.

Please note this library will only work correctly with field groups built using the fusion builder. In theory there shouldn't be any problem working with ACF field groups however the output of native field groups is unpredictable. It is advised to build all field groups using the fusion builder.

### Installing Fusion

```
composer require sackrin/fusion
``` 

### Registering field groups

```php
use Fusion\Builder;
use Fusion\FieldGroup;
use Fusion\Field\Tab;
use Fusion\Field\Group;
use Fusion\Field\Text;
use Fusion\Field\Select;
use Fusion\Field\Repeater;
use Fusion\Field\DatePicker;

function fusion_register() {
    // Create a new builder instance and populate with field group fields
    // It may be a good idea to either store this instance somewhere or create a function to access
    // your builder instance later. You will need it to access and persist field values
    $builder = (new Builder())
        ->addFieldGroup((new FieldGroup('example_settings', 'Settings'))
            // Add that we want these fields to appear on the page post type
            ->addLocation('post_type', 'page')
            // Add various fields, tabs etc
            ->addField((new Tab('profile', 'PROFILE DETAILS')))
            ->addField((new Select('profile_title', 'Title'))
                ->setChoices([
                    'mr' => 'Mr',
                    'mrs' => 'Mrs',
                    'ms' => 'Ms'
                ])
                ->setDefault('mr')
                ->setWrapper(20)
            )
            ->addField((new Text('profile_first_name', 'First Name'))
                ->setPlaceholder('Johnny')
                ->setWrapper(40)
            )
            ->addField((new Text('profile_surname', 'Surname'))
                ->setPlaceholder('Acfseed')
                ->setWrapper(40)
            )
            ->addField((new Group('foroffice', 'Office Use Only'))
                // Repeaters and groups allow for fields to be added directly against them
                ->addField((new DatePicker('signedup_on', 'Signed Up Date'))
                    ->setWrapper(50))
                ->addField((new Text('officer_name', 'Officer Name'))
                    ->setDefault('')
                    ->setWrapper(50))
            )
            ->addField((new Repeater('profile_emails', 'Email Addresses'))
                ->addField((new Text('address', 'Email Address'))
                    ->setPlaceholder('')
                    ->setWrapper(50)
                )
                ->addField((new Text('label', 'Email Label'))
                    ->setPlaceholder('')
                    ->setWrapper(50)
                )
            )
        );
    // Call the acf function to register the field group
    acf_add_local_field_group($builder->toArray());
}

add_action('init', 'fusion_register');

```

### Creating a field group manager

```php
use Fusion\Manager;

// The manager is used to interact with the builder
// It gets and sets fields for post objects etc
$manager = (new Manager($post_id, $builder))->load();

```

### Getting a field from a field group

For non nested fields 

```php
$value = $manager->getField('profile_first_name', 'Some Default Value');
```

For nested fields you use dot notation

```php
$value = $manager->getField('foroffice.signedup_on', 'Some Default Value');
```

For fields within repeaters you use dot notation with index values

```php
$value = $manager->getField('profile_emails.0.address', 'Some Default Value');
```

### Retrieving all current values of a field group

Retrieves all values using the field names

```php
$values = $manager->dumpNames();
```

Retrieves all values using the field keys

```php
$values = $manager->dumpKeys();
```

### Setting a field field groups

Setting fields follows the same path rules as getting including dot notation

```php
$manager->setField('profile_first_name', 'A new name');
```

PLEASE NOTE: Setting a field does not update the database. You can set and interact with fields without persisting to the DB. This is very useful if you want to inject values into a post to make calculations etc. 

### Saving field group values

```php
$manager->save();
```

### Available Fields

```
// Standard fields
new Fusion\Field\ButtonGroup();
new Fusion\Field\Checkbox();
new Fusion\Field\ColorPicker();
new Fusion\Field\DatePicker();
new Fusion\Field\DateTimePicker();
new Fusion\Field\Email();
new Fusion\Field\File();
new Fusion\Field\Gallery();
new Fusion\Field\GoogleMap();
new Fusion\Field\Image();
new Fusion\Field\Message();
new Fusion\Field\Number();
new Fusion\Field\oEmbed();
new Fusion\Field\PageLink();
new Fusion\Field\Password();
new Fusion\Field\PostObject();
new Fusion\Field\Radio();
new Fusion\Field\Range();
new Fusion\Field\Relationship();
new Fusion\Field\Select();
new Fusion\Field\Tab();
new Fusion\Field\Taxonomy();
new Fusion\Field\Text();
new Fusion\Field\Textarea();
new Fusion\Field\TimePicker();
new Fusion\Field\User();
new Fusion\Field\Wysiwyg();

// Fields with subfields
new Fusion\Field\Repeater();
new Fusion\Field\Group();
```