import { Injectable } from '@nestjs/common';
import { JwtService } from '@nestjs/jwt';

import { validateHash } from '../../common/utils';
import type { RoleType } from '../../constants';
import { TokenType } from '../../constants';
import { UserNotFoundException } from '../../exceptions';
import type { UserEntity } from '../user/user.entity';
import { TokenPayloadDto } from './dto/TokenPayloadDto';
import type { UserLoginDto } from './dto/UserLoginDto';
import { HttpService } from '@nestjs/axios';

// import { config } from '@src/config/api';

@Injectable()
export class AuthService {
  constructor(
    private readonly httpService: HttpService,
    private readonly jwtService: JwtService,
  ) {}

  // async validateUser(userLoginDto: UserLoginDto): Promise<UserEntity> {
  //   const user = await this.userService.findOne({
  //     email: userLoginDto.email,
  //   });

  //   const isPasswordValid = await validateHash(
  //     userLoginDto.password,
  //     user?.password,
  //   );

  //   if (!isPasswordValid) {
  //     throw new UserNotFoundException();
  //   }

  //   return user;
  // }

  async createAccessToken(data: {
    role: RoleType;
    userId: number;
  }): Promise<TokenPayloadDto> {
    return new TokenPayloadDto({
      expiresIn: this.configService.authConfig.jwtExpirationTime,
      accessToken: await this.jwtService.signAsync({
        userId: data.userId,
        type: TokenType.ACCESS_TOKEN,
        role: data.role,
      }),
    });
  }
}
