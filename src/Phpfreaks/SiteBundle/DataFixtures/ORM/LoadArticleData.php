<?php

namespace Phpfreaks\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Phpfreaks\SiteBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{

   /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        if($this->hasReference('test-user'))
            $author = $this->getReference('test-user');

        $article = new Article();
        $article->setTitle('Some foobar title');
        $article->setContent(<<<EOT
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices eros vitae leo rutrum vehicula. Fusce iaculis magna eu turpis adipiscing venenatis. Maecenas luctus adipiscing mauris dignissim adipiscing. Etiam tortor enim, pharetra vel porta at, aliquet id arcu. Nullam in eros ut neque malesuada pulvinar adipiscing sit amet dui. Fusce sit amet justo eu magna convallis molestie ut eget sem. Sed suscipit massa quis sem pretium iaculis vitae in quam.</p>
                                <p>Cras pharetra pulvinar enim, quis vestibulum neque congue ac. Morbi non tellus in enim venenatis laoreet vitae sit amet quam. Curabitur et urna velit, quis consequat augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pellentesque ipsum quis mi consectetur bibendum. Vivamus quis risus ut ante congue convallis at id nisl. Ut laoreet enim sit amet odio varius posuere. Vivamus id dui odio, eget euismod nisi. Nullam mi tellus, ornare id lacinia vitae, laoreet eu arcu. Pellentesque fermentum placerat pulvinar. Maecenas eu ante et mauris elementum tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim massa, tincidunt eleifend placerat ac, molestie ac augue. Pellentesque et nulla tortor, ut congue sem. Donec vel purus et leo placerat tristique.</p>
                                <p>Proin dictum cursus elementum. Suspendisse vel metus quam, at porta elit. Nulla mattis pulvinar est, nec bibendum dui feugiat sit amet. Nullam convallis hendrerit vestibulum. Cras vel magna at nunc viverra feugiat. Donec egestas dui at nisi tristique euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec rutrum augue at velit cursus luctus. Quisque scelerisque, nulla vel luctus bibendum, neque tellus ultricies turpis, ac gravida neque lacus ut nisi. Curabitur ultricies sodales luctus. Proin at velit magna, et sollicitudin ligula. Suspendisse potenti. Praesent nec feugiat enim. Donec ullamcorper mauris at elit convallis in accumsan nulla volutpat. Suspendisse pulvinar risus sed lacus volutpat placerat. Mauris mattis, turpis in ullamcorper tempor, mi nulla feugiat mauris, nec dapibus augue erat sed nunc.</p>
                                <p>Pellentesque tempor vulputate quam. Donec sit amet neque dignissim urna ultricies fermentum id in neque. Curabitur dictum libero ut erat scelerisque tempor. Duis bibendum lorem ac ipsum ullamcorper vel sagittis enim luctus. Aliquam lectus justo, pharetra in faucibus ut, laoreet a nibh. Sed venenatis posuere urna sed mattis. Fusce vel purus at dui feugiat bibendum eget ut nisi. In bibendum velit id nulla ornare sed varius nulla gravida.</p>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean tincidunt leo in dui euismod non mollis magna volutpat. Praesent eleifend pellentesque sodales. Nullam risus elit, lacinia eu euismod at, mollis sit amet enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean at leo aliquet ante dictum posuere. Cras a enim eu augue pretium lacinia vel quis mi. Vestibulum quis ultricies neque. Donec velit dolor, pharetra a porttitor quis, lacinia a libero. Nullam elit ligula, ultricies nec porttitor ut, feugiat non libero.</p>
EOT
);
        $article->setAuthor($author);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Another article!');
        $article->setContent(<<<EOT
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices eros vitae leo rutrum vehicula. Fusce iaculis magna eu turpis adipiscing venenatis. Maecenas luctus adipiscing mauris dignissim adipiscing. Etiam tortor enim, pharetra vel porta at, aliquet id arcu. Nullam in eros ut neque malesuada pulvinar adipiscing sit amet dui. Fusce sit amet justo eu magna convallis molestie ut eget sem. Sed suscipit massa quis sem pretium iaculis vitae in quam.</p>
                                <p>Cras pharetra pulvinar enim, quis vestibulum neque congue ac. Morbi non tellus in enim venenatis laoreet vitae sit amet quam. Curabitur et urna velit, quis consequat augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pellentesque ipsum quis mi consectetur bibendum. Vivamus quis risus ut ante congue convallis at id nisl. Ut laoreet enim sit amet odio varius posuere. Vivamus id dui odio, eget euismod nisi. Nullam mi tellus, ornare id lacinia vitae, laoreet eu arcu. Pellentesque fermentum placerat pulvinar. Maecenas eu ante et mauris elementum tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim massa, tincidunt eleifend placerat ac, molestie ac augue. Pellentesque et nulla tortor, ut congue sem. Donec vel purus et leo placerat tristique.</p>
                                <p>Proin dictum cursus elementum. Suspendisse vel metus quam, at porta elit. Nulla mattis pulvinar est, nec bibendum dui feugiat sit amet. Nullam convallis hendrerit vestibulum. Cras vel magna at nunc viverra feugiat. Donec egestas dui at nisi tristique euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec rutrum augue at velit cursus luctus. Quisque scelerisque, nulla vel luctus bibendum, neque tellus ultricies turpis, ac gravida neque lacus ut nisi. Curabitur ultricies sodales luctus. Proin at velit magna, et sollicitudin ligula. Suspendisse potenti. Praesent nec feugiat enim. Donec ullamcorper mauris at elit convallis in accumsan nulla volutpat. Suspendisse pulvinar risus sed lacus volutpat placerat. Mauris mattis, turpis in ullamcorper tempor, mi nulla feugiat mauris, nec dapibus augue erat sed nunc.</p>
                                <p>Pellentesque tempor vulputate quam. Donec sit amet neque dignissim urna ultricies fermentum id in neque. Curabitur dictum libero ut erat scelerisque tempor. Duis bibendum lorem ac ipsum ullamcorper vel sagittis enim luctus. Aliquam lectus justo, pharetra in faucibus ut, laoreet a nibh. Sed venenatis posuere urna sed mattis. Fusce vel purus at dui feugiat bibendum eget ut nisi. In bibendum velit id nulla ornare sed varius nulla gravida.</p>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean tincidunt leo in dui euismod non mollis magna volutpat. Praesent eleifend pellentesque sodales. Nullam risus elit, lacinia eu euismod at, mollis sit amet enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean at leo aliquet ante dictum posuere. Cras a enim eu augue pretium lacinia vel quis mi. Vestibulum quis ultricies neque. Donec velit dolor, pharetra a porttitor quis, lacinia a libero. Nullam elit ligula, ultricies nec porttitor ut, feugiat non libero.</p>
EOT
);
        $article->setAuthor($author);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Yet again, more articles!');
        $article->setContent(<<<EOT
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices eros vitae leo rutrum vehicula. Fusce iaculis magna eu turpis adipiscing venenatis. Maecenas luctus adipiscing mauris dignissim adipiscing. Etiam tortor enim, pharetra vel porta at, aliquet id arcu. Nullam in eros ut neque malesuada pulvinar adipiscing sit amet dui. Fusce sit amet justo eu magna convallis molestie ut eget sem. Sed suscipit massa quis sem pretium iaculis vitae in quam.</p>
                                <p>Cras pharetra pulvinar enim, quis vestibulum neque congue ac. Morbi non tellus in enim venenatis laoreet vitae sit amet quam. Curabitur et urna velit, quis consequat augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pellentesque ipsum quis mi consectetur bibendum. Vivamus quis risus ut ante congue convallis at id nisl. Ut laoreet enim sit amet odio varius posuere. Vivamus id dui odio, eget euismod nisi. Nullam mi tellus, ornare id lacinia vitae, laoreet eu arcu. Pellentesque fermentum placerat pulvinar. Maecenas eu ante et mauris elementum tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim massa, tincidunt eleifend placerat ac, molestie ac augue. Pellentesque et nulla tortor, ut congue sem. Donec vel purus et leo placerat tristique.</p>
                                <p>Proin dictum cursus elementum. Suspendisse vel metus quam, at porta elit. Nulla mattis pulvinar est, nec bibendum dui feugiat sit amet. Nullam convallis hendrerit vestibulum. Cras vel magna at nunc viverra feugiat. Donec egestas dui at nisi tristique euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec rutrum augue at velit cursus luctus. Quisque scelerisque, nulla vel luctus bibendum, neque tellus ultricies turpis, ac gravida neque lacus ut nisi. Curabitur ultricies sodales luctus. Proin at velit magna, et sollicitudin ligula. Suspendisse potenti. Praesent nec feugiat enim. Donec ullamcorper mauris at elit convallis in accumsan nulla volutpat. Suspendisse pulvinar risus sed lacus volutpat placerat. Mauris mattis, turpis in ullamcorper tempor, mi nulla feugiat mauris, nec dapibus augue erat sed nunc.</p>
                                <p>Pellentesque tempor vulputate quam. Donec sit amet neque dignissim urna ultricies fermentum id in neque. Curabitur dictum libero ut erat scelerisque tempor. Duis bibendum lorem ac ipsum ullamcorper vel sagittis enim luctus. Aliquam lectus justo, pharetra in faucibus ut, laoreet a nibh. Sed venenatis posuere urna sed mattis. Fusce vel purus at dui feugiat bibendum eget ut nisi. In bibendum velit id nulla ornare sed varius nulla gravida.</p>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean tincidunt leo in dui euismod non mollis magna volutpat. Praesent eleifend pellentesque sodales. Nullam risus elit, lacinia eu euismod at, mollis sit amet enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean at leo aliquet ante dictum posuere. Cras a enim eu augue pretium lacinia vel quis mi. Vestibulum quis ultricies neque. Donec velit dolor, pharetra a porttitor quis, lacinia a libero. Nullam elit ligula, ultricies nec porttitor ut, feugiat non libero.</p>
EOT
);
        $article->setAuthor($author);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Another article!');
        $article->setContent(<<<EOT
                                Duplicate title! <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices eros vitae leo rutrum vehicula. Fusce iaculis magna eu turpis adipiscing venenatis. Maecenas luctus adipiscing mauris dignissim adipiscing. Etiam tortor enim, pharetra vel porta at, aliquet id arcu. Nullam in eros ut neque malesuada pulvinar adipiscing sit amet dui. Fusce sit amet justo eu magna convallis molestie ut eget sem. Sed suscipit massa quis sem pretium iaculis vitae in quam.</p>
                                <p>Cras pharetra pulvinar enim, quis vestibulum neque congue ac. Morbi non tellus in enim venenatis laoreet vitae sit amet quam. Curabitur et urna velit, quis consequat augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pellentesque ipsum quis mi consectetur bibendum. Vivamus quis risus ut ante congue convallis at id nisl. Ut laoreet enim sit amet odio varius posuere. Vivamus id dui odio, eget euismod nisi. Nullam mi tellus, ornare id lacinia vitae, laoreet eu arcu. Pellentesque fermentum placerat pulvinar. Maecenas eu ante et mauris elementum tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim massa, tincidunt eleifend placerat ac, molestie ac augue. Pellentesque et nulla tortor, ut congue sem. Donec vel purus et leo placerat tristique.</p>
                                <p>Proin dictum cursus elementum. Suspendisse vel metus quam, at porta elit. Nulla mattis pulvinar est, nec bibendum dui feugiat sit amet. Nullam convallis hendrerit vestibulum. Cras vel magna at nunc viverra feugiat. Donec egestas dui at nisi tristique euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec rutrum augue at velit cursus luctus. Quisque scelerisque, nulla vel luctus bibendum, neque tellus ultricies turpis, ac gravida neque lacus ut nisi. Curabitur ultricies sodales luctus. Proin at velit magna, et sollicitudin ligula. Suspendisse potenti. Praesent nec feugiat enim. Donec ullamcorper mauris at elit convallis in accumsan nulla volutpat. Suspendisse pulvinar risus sed lacus volutpat placerat. Mauris mattis, turpis in ullamcorper tempor, mi nulla feugiat mauris, nec dapibus augue erat sed nunc.</p>
                                <p>Pellentesque tempor vulputate quam. Donec sit amet neque dignissim urna ultricies fermentum id in neque. Curabitur dictum libero ut erat scelerisque tempor. Duis bibendum lorem ac ipsum ullamcorper vel sagittis enim luctus. Aliquam lectus justo, pharetra in faucibus ut, laoreet a nibh. Sed venenatis posuere urna sed mattis. Fusce vel purus at dui feugiat bibendum eget ut nisi. In bibendum velit id nulla ornare sed varius nulla gravida.</p>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean tincidunt leo in dui euismod non mollis magna volutpat. Praesent eleifend pellentesque sodales. Nullam risus elit, lacinia eu euismod at, mollis sit amet enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean at leo aliquet ante dictum posuere. Cras a enim eu augue pretium lacinia vel quis mi. Vestibulum quis ultricies neque. Donec velit dolor, pharetra a porttitor quis, lacinia a libero. Nullam elit ligula, ultricies nec porttitor ut, feugiat non libero.</p>
EOT
);
        $article->setAuthor($author);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('One last article');
        $article->setContent(<<<EOT
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices eros vitae leo rutrum vehicula. Fusce iaculis magna eu turpis adipiscing venenatis. Maecenas luctus adipiscing mauris dignissim adipiscing. Etiam tortor enim, pharetra vel porta at, aliquet id arcu. Nullam in eros ut neque malesuada pulvinar adipiscing sit amet dui. Fusce sit amet justo eu magna convallis molestie ut eget sem. Sed suscipit massa quis sem pretium iaculis vitae in quam.</p>
                                <p>Cras pharetra pulvinar enim, quis vestibulum neque congue ac. Morbi non tellus in enim venenatis laoreet vitae sit amet quam. Curabitur et urna velit, quis consequat augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pellentesque ipsum quis mi consectetur bibendum. Vivamus quis risus ut ante congue convallis at id nisl. Ut laoreet enim sit amet odio varius posuere. Vivamus id dui odio, eget euismod nisi. Nullam mi tellus, ornare id lacinia vitae, laoreet eu arcu. Pellentesque fermentum placerat pulvinar. Maecenas eu ante et mauris elementum tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim massa, tincidunt eleifend placerat ac, molestie ac augue. Pellentesque et nulla tortor, ut congue sem. Donec vel purus et leo placerat tristique.</p>
                                <p>Proin dictum cursus elementum. Suspendisse vel metus quam, at porta elit. Nulla mattis pulvinar est, nec bibendum dui feugiat sit amet. Nullam convallis hendrerit vestibulum. Cras vel magna at nunc viverra feugiat. Donec egestas dui at nisi tristique euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec rutrum augue at velit cursus luctus. Quisque scelerisque, nulla vel luctus bibendum, neque tellus ultricies turpis, ac gravida neque lacus ut nisi. Curabitur ultricies sodales luctus. Proin at velit magna, et sollicitudin ligula. Suspendisse potenti. Praesent nec feugiat enim. Donec ullamcorper mauris at elit convallis in accumsan nulla volutpat. Suspendisse pulvinar risus sed lacus volutpat placerat. Mauris mattis, turpis in ullamcorper tempor, mi nulla feugiat mauris, nec dapibus augue erat sed nunc.</p>
                                <p>Pellentesque tempor vulputate quam. Donec sit amet neque dignissim urna ultricies fermentum id in neque. Curabitur dictum libero ut erat scelerisque tempor. Duis bibendum lorem ac ipsum ullamcorper vel sagittis enim luctus. Aliquam lectus justo, pharetra in faucibus ut, laoreet a nibh. Sed venenatis posuere urna sed mattis. Fusce vel purus at dui feugiat bibendum eget ut nisi. In bibendum velit id nulla ornare sed varius nulla gravida.</p>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean tincidunt leo in dui euismod non mollis magna volutpat. Praesent eleifend pellentesque sodales. Nullam risus elit, lacinia eu euismod at, mollis sit amet enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean at leo aliquet ante dictum posuere. Cras a enim eu augue pretium lacinia vel quis mi. Vestibulum quis ultricies neque. Donec velit dolor, pharetra a porttitor quis, lacinia a libero. Nullam elit ligula, ultricies nec porttitor ut, feugiat non libero.</p>
EOT
);
        $article->setAuthor($author);
        $manager->persist($article);

        // Save articles
        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}