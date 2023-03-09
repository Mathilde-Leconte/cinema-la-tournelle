<?php

namespace App\Test\Controller;

use App\Entity\TypeDeSeance;
use App\Repository\TypeDeSeanceRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypeDeSeanceControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private TypeDeSeanceRepository $repository;
    private string $path = '/admin/type/de/seance/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(TypeDeSeance::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('TypeDeSeance index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'type_de_seance[nom]' => 'Testing',
            'type_de_seance[prive]' => 'Testing',
            'type_de_seance[publique]' => 'Testing',
            'type_de_seance[description]' => 'Testing',
        ]);

        self::assertResponseRedirects('/admin/type/de/seance/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new TypeDeSeance();
        $fixture->setNom('My Title');
        $fixture->setPrive('My Title');
        $fixture->setPublique('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('TypeDeSeance');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new TypeDeSeance();
        $fixture->setNom('My Title');
        $fixture->setPrive('My Title');
        $fixture->setPublique('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'type_de_seance[nom]' => 'Something New',
            'type_de_seance[prive]' => 'Something New',
            'type_de_seance[publique]' => 'Something New',
            'type_de_seance[description]' => 'Something New',
        ]);

        self::assertResponseRedirects('/admin/type/de/seance/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrive());
        self::assertSame('Something New', $fixture[0]->getPublique());
        self::assertSame('Something New', $fixture[0]->getDescription());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new TypeDeSeance();
        $fixture->setNom('My Title');
        $fixture->setPrive('My Title');
        $fixture->setPublique('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/admin/type/de/seance/');
    }
}
