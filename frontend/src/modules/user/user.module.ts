import { Module } from '@nestjs/common';
import { HttpModule } from '@nestjs/axios';
import { UserService } from './user.service';

@Module({
  imports: [HttpModule],
  exports: [],
  controllers: [],
  providers: [UserService],
})
export class UserModule {}
