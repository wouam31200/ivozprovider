<?php

namespace Ivoz\Ast\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ivoz\Ast\Domain\Model\Voicemail\VoicemailRepository;

/**
 * VoicemailDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoicemailDoctrineRepository extends EntityRepository implements VoicemailRepository
{
}
