import { authRouter } from '@modules/auth';
import { router } from './trpc';

export const appRouter = router({
  auth: authRouter,
});

export type AppRouter = typeof appRouter;
