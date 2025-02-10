<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        # Personality test questions and their answers
        $question1 = new Question();
        $question1->setText('Les gens s\'ennuiraient sans moi.');
        $this->AssignAnswer($manager, $question1, 'Non', 'Mouais', 'Grave');

        $question2 = new Question();
        $question2->setText('Une soirée idéale pour toi, c\'est...');
        $this->AssignAnswer($manager, $question2, 'Netflix & chill', 'Un bon resto', 'Une soirée jeux de société');

        $question3 = new Question();
        $question3->setText('Tu es plutôt...');
        $this->AssignAnswer($manager, $question3, 'Du matin', 'Du soir', 'De l\'après-midi');

        $question4 = new Question();
        $question4->setText('Tes derniers mots avant de partir...');
        $this->AssignAnswer($manager, $question4, 'Je vous aime', 'Je reviendrai', 'Je reviens');

        $manager->persist($question1);
        $manager->persist($question2);
        $manager->persist($question3);
        $manager->persist($question4);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param Question $question
     * @param $answerText1
     * @param $answerText2
     * @param $answerText3
     * @return void
     */
    public function AssignAnswer(ObjectManager $manager, Question $question, $answerText1, $answerText2, $answerText3): void
    {
        $manager->persist($question);

        $answer1 = new Answer();
        $answer1->setText($answerText1);
        $answer1->setScore(1);
        $answer1->setQuestion($question);
        $manager->persist($answer1);

        $answer2 = new Answer();
        $answer2->setText($answerText2);
        $answer2->setScore(2);
        $answer2->setQuestion($question);
        $manager->persist($answer2);

        $answer3 = new Answer();
        $answer3->setText($answerText3);
        $answer3->setScore(3);
        $answer3->setQuestion($question);
        $manager->persist($answer3);

        $manager->flush();
    }
}
