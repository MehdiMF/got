<?php

namespace AppBundle\Controller;
header('Access-Control-Allow-Origin: *');
use Symfony\Component\DependencyInjection\ContainerAware,
    Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Entity\Voiture;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations as Rest;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    public function accueilAction(Request $request){
        
        $number=20;
        $nom="Mehdi";
        return $this->render('default/voitures_disponibles.html.twig', array(
            'number' => $number, 'nom' => $nom,
        ));

    }

    public function voitureAction(Request $request){

        return $this->render('voitures/voitures.html');
    }

//------------------------------API Rest-----------------------------------------------------------------------
/**
     * @Rest\View
     */
    public function allAction()
    {
        $users = UserQuery::create()->find();
        return array('users' => $users);
    }
//-------------------------------------------------------------------------------------------------------------    

// Retourner les voitures disponibles sous forme de JSON--------------------------------------------------------
   public function afficherVoituresAction()
                    {
            $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Voiture');
            $listVoitures = $repository->voituresDisponibles('Oui');
            $response = array();
            foreach ($listVoitures as $voiture) {
            $response[] = [
            'id' => $voiture->getId(),
            'marque' => $voiture->getMarque(),
            'modele' => $voiture->getModele(),
            'couleur' => $voiture->getCouleur(),
            'date_circu' => $voiture->getDateCircu(),
            'prix_jour' => $voiture->getPrixJour(),
            'disponibilite' => $voiture->getDisponibilite(),'matricule' => $voiture->getMatricule()];
}
             return new JsonResponse(array('voitures' => $response));                   }
//---------------------------------------------------------------------------------------------------------------
// Test JsonResponse---------------------------------------------------------------------------------------------
     /**
     * @Route("/foo", name="places_list")
     * @Method({"GET"})
     */
        public function fooAction()
{
    $em = $this->getDoctrine()->getManager();
    $query = $em->createQuery(
        'SELECT v
        FROM AppBundle:Voiture v'
    );
    $vtr = $query->getArrayResult();
    $response = new Response(json_encode($vtr));
    $response->headers->set('Content-Type', 'application/json');
    return new JsonResponse(array('voitures'=> $vtr));}
//---------------------------------------------------------------------------------------------------------------     
// Ajout d'une nouvelle voiture ---------------------------------------------------------------------------------
   public function ajouterVoitureAction(Request $request)
    {
        $voiture = new Voiture();
        $voitureForm = $this->createFormBuilder($voiture)
        ->add('marque', "text")
        ->add('modele', "text")
        ->add('couleur', "text")
        ->add('matricule', "text")
        ->add('date_circu', "date")
        ->add('disponibilite', "text")
        ->add('save', "submit", array('label' => 'Ajouter'))
        ->getForm();

    $voitureForm->handleRequest($request);

    if ($voitureForm->isSubmitted() && $voitureForm->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($voiture);
        $em->flush();

        return $this->redirect($this->generateUrl('task_success'));    }

    return $this->render('voitures/ajouter_voiture.html.twig', array(
        'voiture' => $voiture,
        'form' => $voitureForm->createView(),
    ));
    } 
//----------------------------------------------------------------------------------------------------------------

    public function successAction (Request $request){
        return $this->render('voitures/sucess.html.twig');
    }
// Function postData recieved from the angular form-------------------------------------------------------
  
  public function postAction(Request $request){
        
        $data               = file_get_contents("php://input");
        $dataJsonDecode     = json_decode($data);
      
        $voiture = new Voiture();
  

        $voiture->setMarque($dataJsonDecode->marque);
        $voiture->setModele($dataJsonDecode->modele);
        $voiture->setCouleur($dataJsonDecode->couleur);
        $voiture->setMatricule($dataJsonDecode->matricule);
        $voiture->setDisponibilite($dataJsonDecode->disponibilite);
        $voiture->setPrixJour($dataJsonDecode->prixjour);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($voiture);
        $entityManager->flush();
        return new Response('Voiture ajoutée');
  }

//--------------------------------------------------------------------------------------------------------                    

}
