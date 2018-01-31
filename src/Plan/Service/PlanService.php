<?php
namespace Virtuagym\Plan\Service;

use Virtuagym\Plan\Entity\Exercise;
use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanDay;
use Virtuagym\Plan\ExerciseRepositoryInterface;
use Virtuagym\Plan\PlanDayRepositoryInterface;
use Virtuagym\Plan\PlanServiceInterface;
use Virtuagym\User\Entity\User;
use Virtuagym\User\Entity\UserCollection;

class PlanService implements PlanServiceInterface
{
    const NOTIFICATION_USER_ASSIGNED = 'You just got assigned a new plan';
    const NOTIFICATION_USER_REMOVED = 'You are no longer assigned to a plan';
    const NOTIFICATION_PLAN_CHANGED = 'There have been changes to your workout plan. Check them out!';

    private $planDayRepository;
    private $exerciseRepository;

    public function __construct(
        PlanDayRepositoryInterface $planDayRepository,
        ExerciseRepositoryInterface $exerciseRepository
    )
    {
        $this->planDayRepository = $planDayRepository;
        $this->exerciseRepository = $exerciseRepository;
    }

    /**
     * @param User $user
     * @param Plan $plan
     * @return bool
     *
     * @todo Send an email
     */
    public function assignUserToPlan(User $user, Plan $plan)
    {
        $plan->users()->save($user);

        $this->notify($user, self::NOTIFICATION_USER_ASSIGNED);

        return true;
    }

    /**
     * @param User $user
     * @param Plan $plan
     * @return bool
     */
    public function removeUserFromPlan(User $user, Plan $plan)
    {
        $user->plan_id = null;
        $user->save();

        $this->notify($user, self::NOTIFICATION_USER_REMOVED);

        return true;
    }

    /**
     * @param Plan $plan
     * @param string $dayName
     * @return PlanDay
     */
    public function addDayToPlan(Plan $plan, $dayName)
    {
        $planDay = $this->planDayRepository->create($plan, $dayName);

        $this->notifyUsers($plan->users()->get(), self::NOTIFICATION_PLAN_CHANGED);

        return $planDay;
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param $exerciseName
     * @return Exercise
     */
    public function addExerciseToDay(Plan $plan, PlanDay $day, $exerciseName)
    {
        $exercise = $this->exerciseRepository->create($day, $exerciseName);

        $this->notifyUsers($plan->users()->get(), self::NOTIFICATION_PLAN_CHANGED);

        return $exercise;
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @return bool
     */
    public function removeDayFromPlan(Plan $plan, PlanDay $day)
    {
        $this->planDayRepository->destroy($day->id);

        $this->notifyUsers($plan->users()->get(), self::NOTIFICATION_PLAN_CHANGED);

        return true;
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param Exercise $exercise
     * @return bool
     */
    public function removeExerciseFromDay(Plan $plan, PlanDay $day, Exercise $exercise)
    {
        $this->exerciseRepository->destroy($exercise->id);

        $this->notifyUsers($plan->users()->get(), self::NOTIFICATION_PLAN_CHANGED);

        return true;
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param array $params
     * @return bool
     */
    public function updateDayFromPlan(Plan $plan, PlanDay $day, array $params)
    {
        $this->planDayRepository->update($day, $params);

        $this->notifyUsers($plan->users()->get(), self::NOTIFICATION_PLAN_CHANGED);

        return true;
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param Exercise $exercise
     * @param array $params
     * @return bool
     */
    public function updateExerciseFromDay(Plan $plan, PlanDay $day, Exercise $exercise, array $params)
    {
        $this->exerciseRepository->update($exercise, $params);

        $this->notifyUsers($plan->users()->get(), self::NOTIFICATION_PLAN_CHANGED);

        return true;
    }

    private function notifyUsers(UserCollection $users, $message)
    {
        foreach($users as $user)
        {
            $this->notify($user, $message);
        }
    }

    private function notify(User $user, $message)
    {
        try {
            \Mail::send('emails.default', ['title' => 'Message from Hector Assessment', 'content' => $message], function ($mail) use ($user) {
                $mail->from('hectorassessment@gmail.com', 'Hector Ordonez');
                $mail->to($user->email);
            });
        } catch (ClientException $e) {
            // Ideally we would log this so we can debug why the mails are not being sent
        }

    }
}
