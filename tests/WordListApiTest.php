<?php
namespace wordnik\tests;

require_once 'BaseApiTest.php';

date_default_timezone_set('America/Los_Angeles');

class WordListApiTest extends BaseApiTest {

  public function setUp() {
    parent::setUp();
    $this->authToken = $this->accountApi->authenticate($this->username, $this->password);
    $lists = $this->accountApi->getWordListsForLoggedInUser($this->authToken, $skip=null, $limit=1);
    $this->existingList = $lists[0];

    $this->wordList = new \wordnik\WordList();
    $this->wordList->name = "my test list";
    $this->wordList->type = "PUBLIC";
    $this->wordList->description = "some words I want to play with";
  }


  public function testGetWordListByPermalink() {
    $res = $this->wordListApi->getWordListByPermalink($this->existingList->permalink,
                                           $this->authToken);
    $this->assertNotEquals(null, $res);
  }


  public function testUpdateWordList() {
    $description = 'list updated at ' . time();
    $this->existingList->description = $description;
    $this->wordListApi->updateWordList($this->existingList->permalink,
                                       $body=$this->existingList,
                                       $this->authToken);
    $res = $this->wordListApi->getWordListByPermalink($this->existingList->permalink, $this->authToken);
    $this->assertEquals($description, $res->description);
  }

  public function testAddWordsToWordList() {
    $wordsToAdd = array();
    $word1 = new \wordnik\StringValue();
    $word1->word = "delicious";
    $wordsToAdd[] = $word1;
    $word2 = new \wordnik\StringValue();
    $word2->word = "tasty";
    $wordsToAdd[] = $word2;
    $word3 = new \wordnik\StringValue();
    $word3->word = "scrumptious";
    $wordsToAdd[] = $word3;
    $word4 = new \wordnik\StringValue();
    $word4->word = "not to be deleted";
    $wordsToAdd[] = $word4;

    $this->wordListApi->addWordsToWordList($this->existingList->permalink,
                                           $body=$wordsToAdd,
                                           $this->authToken);

    $res = $this->wordListApi->getWordListWords($this->existingList->permalink, $this->authToken);

    $returnedWords = array();

    foreach ($res as $wordListWord) {
      $returnedWords[] = $wordListWord->word;
    }

    $intersection = array();
    foreach ($wordsToAdd as $addedWord) {
      if (in_array($addedWord->word, $returnedWords)) {
        $intersection[] = $addedWord->word;
      }
    }

    $this->assertEquals(4, count($intersection));
  }


  public function testDeleteWordsFromList() {
    $wordsToRemove = array();
    $word1 = new \wordnik\StringValue();
    $word1->word = "delicious";
    $wordsToRemove[] = $word1;
    $word2 = new \wordnik\StringValue();
    $word2->word = "tasty";
    $wordsToRemove[] = $word2;
    $word3 = new \wordnik\StringValue();
    $word3->word = "scrumptious";
    $wordsToRemove[] = $word3;

    $res = $this->wordListApi->getWordListWords($this->existingList->permalink, $this->authToken);

    $this->wordListApi->deleteWordsFromWordList($this->existingList->permalink, $body=$wordsToRemove, $this->authToken);

    $res = $this->wordListApi->getWordListWords($this->existingList->permalink, $this->authToken);

    $returnedWords = array();
    foreach ($res as $wordListWord) {
      $returnedWords[] = $wordListWord->word;
    }

    $intersection = array();
    foreach ($wordsToRemove as $removedWord) {
      if (in_array($removedWord->word, $returnedWords)) {
        $intersection[] = $removedWord->word;
      }
    }

    $this->assertEquals(0, count($intersection));
  }


}
?>
